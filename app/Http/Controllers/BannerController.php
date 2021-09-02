<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;

use Illuminate\Http\Request;
use App\Event;
use App\banner;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    // [GET] banner
    public function index() {
        $banner = banner::all();
        return view('admin.banner.list',['banner'=>$banner]);
    }

    // [GET] banner/add
    public function add() {
        return view('admin.banner.add');
    }

    // [POST] banner/add
    public function addstored(Request $request) {
        $this->validate($request,[
            'name'=>'required|min:3|unique:banner,name',
            'image'=>'required'
        
          ],[
             'name.required'=>'Bạn chưa nhập tên banner',
             'name.min'=>'Tên banner phải có ít nhất 3 ký tự',
             'name.unique'=>'Tên banner đã tồn tại',
             'image.required'=>'Bạn chưa chọn hình ảnh'
          ]);

        $banner = new banner;
        $banner->name = $request->name;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $name =$file->getClientOriginalName();
            $image = str_random(10)."_".$name;
            $file->move("upload/banner",$image);
            $banner->image=$image;

        }
        else
        {
        $banner->image = "";
        }
        $banner->status = 0;
        $banner->save();

        return redirect()->back()->with('thongbao','Thêm Banner Thành Công!');

    }

    // [GET]  banner/edit/{id}
    public function edit( $id) {
        $banner = banner::find($id);
        if(!$banner) return redirec()->back()->with('thongbao','Lỗi Hệ Thống Xin Vui Lòng Thử Lại!');
        return view('admin.banner.edit',['banner'=>$banner]);
    }

    // [POST]  banner/edit/{id}
    public function editstored(Request $request,$id) {
        $this->validate($request,[
                'name'=>'required|min:3',
                'image'=>'required'
              ],[
                 'name.required'=>'Bạn chưa nhập tên banner',
                 'name.min'=>'Tên banner phải có ít nhất 3 ký tự',
                 'image.required'=>'Bạn chưa chọn hình ảnh'
              ]);
        $banner = banner::find($id);
        if($banner) {
                $banner->name = $request->name;
                if($request->hasFile('image'))
                {
                    $file = $request->file('image');
                    $name =$file->getClientOriginalName();
                    $image = str_random(10)."_".$name;
                    $file->move("upload/banner",$image);
                    $banner->image=$image;
        
                }
                if($request->status) {
                    $banner -> status=  $request->status;

                }
            
                $banner -> save();
                return redirect('/banner')->with('thongbao','Sửa Banner Thành Công!');

        }
        else
          return redirect('/banner')->with('thongbao','Lỗi Hệ Thống Xin Vui Lòng Thử Lại!');
    }
    
    // [GET] banner/delete/{id}
    public function delete($id) {
        $banner = banner::find($id);
        if($banner) {
            $banner->delete();
            return redirect('/banner')->with('thongbao','Xóa Banner Thành Công!');

        }
        else
          return redirect('/banner')->with('thongbao','Lỗi Hệ Thống Xin Vui Lòng Thử Lại!');

    }

    //[GET] banner/active/{id}
    public function active ($id) {
        $banner = banner::find($id);
        if(!$banner) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        DB::table('banner')
        ->where('id', $id)
        ->update(['status' =>0]);
        return redirect()->back()->with('thongbao','Active nhãn hàng thành công!');
    }

    //[GET] banner/unactive/{id}
    public function unactive ($id) {
        $banner = banner::find($id);
        if(!$banner) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        DB::table('banner')
        ->where('id', $id)
        ->update(['status' =>1]);
        return redirect()->back()->with('thongbao','UnActive nhãn hàng thành công!');
    }
}
