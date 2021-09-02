<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Validator;

use Illuminate\Http\Request;
use App\Event;
use App\coupon;
use App\coupon_used;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class CouponController extends Controller
{
    // [GET] coupon/index
    public function index() {
        $coupon = coupon::all();
        return view('admin.coupon.list',['coupon'=>$coupon]);
    }

    public function used() {
        $coupon_used = coupon_used::all();
        return view('admin.coupon.used',['coupon_used'=>$coupon_used]);
    }

    // [GET] coupon/add
    public function add() {
        return view('admin.coupon.add');
    }

    // [POST] coupon/add
    public function postAdd(Request $req) {

        if($req->discount <=0 || $req->discount >=100 ) return redirect()->back()->with('thongbao',' Không thể nhập Discount < 0 hoặc >=100. Discount là ký tự số!');

        $this->validate($req,[
            'name'=>'required|min:5|unique:coupon,name',
            'discount'=>'required|numeric',
       

         
          ],[
             'name.required'=>'Bạn chưa nhập tên coupon',
             'name.min'=>'Tên coupon phải có ít nhất 5 ký tự',
             'name.unique'=>'Tên coupon đã tồn tại',
             'discount.required'=>'Bạn chưa nhập giảm giá',
             'discount.numeric'=>'Phải nhập giảm giá bằng ký tự số',



            
          ]);
        $coupon = new coupon;
        $coupon -> name = $req->name;
        $coupon -> discount = $req->discount;
        $coupon->code = strtoupper(Str::random(6));
        $coupon -> status = 0;
        $coupon -> save();
        
        return redirect()->back()->with('thongbao','Thêm thành công!');

        return view('admin.coupon.add');
    }

      // [GET] coupon/active/{id}
      public function active ($id) {
        $coupon = coupon::find($id);
        DB::table('coupon')
        ->where('id', $id)
        ->update(['status' =>0]);
        return redirect()->back()->with('thongbao','Active coupon thành công!');
    }

    // [GET] coupon/unactive/{id}
    public function unactive ($id) {
        $coupon = coupon::find($id);
        DB::table('coupon')
        ->where('id', $id)
        ->update(['status' =>1]);
        return redirect()->back()->with('thongbao','UnActive coupon thành công!');
    }
}
