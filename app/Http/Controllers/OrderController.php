<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Event;
use App\orders;
use App\order_details;
use App\product;
use App\User;
use App\shipping;
use Carbon\Carbon;

class OrderController extends Controller
{

    // [GET] orders/index
    public function index(Request $request) {
        $orders = orders::all()->sortByDesc('created_at');


        foreach ($orders as $o) {
            if($o->order_total_money == 0) {
                DB::table('orders')
                ->where('id',$o->id)
                ->update(['status' => 3]);
            }
        }
        if($request->q){
            $fillter = $request->q;
            switch($fillter) {
                case 0:
                    $orders = orders::all();
                    break;
                case 1:
                    $orders = orders::all()->where('status',0);
                    break;
                case 2:
                    $orders = orders::all()->where('status',1);
                    break;    
                case 3:
                    $orders = orders::all()->where('status',2);
                    break;
                case 4:
                    $orders = orders::all()->where('status',3);
                    break;  
            }
        }


        return view('admin.order.list',['orders'=>$orders]);
    }

    // [GET] orders/thongke
    public function thongke(){
        return view('admin.order.thongke');
    }

    // [POST] orders/thongke
    public function postthongke(Request $request){
        $sdt = strlen($request->year);
        if($sdt!=4) redirect()->back()->with('thongbao','Bạn phải nhập số năm đủ 4 ký tự!');
        $this->validate($request,[
            'year'=>'required|numeric',
        
          ],[
             'year.required'=>'Bạn chưa nhập năm cần thống kê',
             'year.numeric'=>'Năm nhập phải là ký tự số',
            
          ]);
        $donh= orders::whereMonth('updated_at', $request->month)->whereYear('updated_at', $request->year)->get();
        $chitietdh = order_details::all();
        $tongdon = 0;
        $slsanpham = 0;
        $choxn = 0;
        $cholh = 0;
        $dagiao = 0;
        $dahuy = 0;
        $tongtien = 0;
        $thang = $request->month;
        $nam = $request->year;

        foreach ($donh as $d) {
            // tổng số lượng đơn hàng
            $tongdon = $tongdon +1;

            // tổng số sản phẩm đã bán
            if($d->status == 2) {
                foreach($chitietdh as $od_dt){
                    if($d->id == $od_dt->order_id ) {
                        $slsanpham = $slsanpham + $od_dt->qty;
                    }
                }
            }

            // tổng số đơn chờ xác nhận
            if($d->status == 0) {
                $choxn = $choxn + 1;
            }

             // tổng số đơn chờ lấy hàng
             if($d->status == 1) {
                $cholh = $cholh + 1;
            }
            
             // tổng số đơn đã giao + tổng tiền đã bán
             if($d->status == 2) {
                $dagiao = $dagiao + 1;
                $tongtien = $tongtien + $d->order_total_money;
            }

              // tổng số đơn đã hủy
              if($d->status == 3) {
                $dahuy = $dahuy + 1;
            }
        }
        return view('admin.order.thongke',[
            'tongdon'=>$tongdon,
            'slsanpham'=>$slsanpham,
            'choxn'=>$choxn,
            'cholh'=>$cholh,
            'dagiao'=>$dagiao,
            'dahuy'=>$dahuy,
            'tongtien'=>$tongtien,
            'thang'=>$thang,
            'nam'=>$nam,

        ]);

    }

    // [GET] orders/chuyen-trang-thai/{id}
    public function edit($id) {
        $orders = orders::find($id);
        if(!$orders) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vùi lòng thử lại!');
        if($orders->status < 2 ) {
            DB::table('orders')
            ->where('id',$id)
            ->update(['status' =>($orders->status + 1)]);
            return redirect()->back()->with('thongbao','Chuyển Trạng Thái Thành Công!');
        } 
        else    
            return redirect()->back()->with('thongbao','Đơn Hàng Không Thể Chuyển Trạng Thái!');
    }

    // [GET] orders/huy-don-hang/{id}
    public function huydon($id) {
        $orders = orders::find($id);
        if(!$orders) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vùi lòng thử lại!');
        if($orders->status==2){
            return redirect()->back()->with('thongbao','Đơn hàng này không thể hủy!');
        }
        else {
            DB::table('orders')
            ->where('id',$id)
            ->update(['status' => 3 ]);
            return redirect()->back()->with('thongbao','Hủy Đơn Hàng Thành Công!');
        }
    }

    // [GET] orders/shipping/{id}
    public function indexship($id) {
        $ship = shipping::find($id);
     
        if(!$ship) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vùi lòng thử lại!');
        return view('admin.order.shiplist',['ship'=>$ship]);
    }

    // [GET] orders/order_details/{id}
    public function indexdt($id) {
        $order_details = order_details::all()->where('order_id',$id);
        if(!$order_details) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vùi lòng thử lại!');
        return view('admin.order.order_detail',['order_details'=>$order_details]);
    }

    // [GET] orders/delete/{id}
    public function delete($id) {
        // xóa chi tiết đh
        $order_details = order_details::find($id);
        if(!$order_details) return redirect()->back();
        $orders = orders::find($order_details->order_id );
        if($orders->status == 1 || $orders->status == 2 || $orders->status == 3 ) {
            return redirect()->back()->with('thongbao','Không thể xóa sản phẩm trong đơn hàng này!');
        }
       
        $order_details->delete();
        
        // cập nhật lại giá tiền đơn hàng
        $ds_ord_detail = order_details::all()->where('order_id',$orders->id);

        $tongtien = 0;
        
        foreach ($ds_ord_detail as $o) {
            if($o->price_sale != 0) {
                $tongtien += ($o->qty * $o->price_sale);
            }
            else {
                $tongtien += $o->qty * $o->price_old;
            }
        }
        $id = $orders->id;
        $order_total_money = $tongtien;

        DB::table('orders')
        ->where('id',$id)
        ->update(['order_total_money' => $order_total_money]);


        return redirect()->back()->with('thongbao','Xóa Sản Phẩm Thành Công!');
        

    }

}
