<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Event;
use App\brand;

class BrandController extends Controller
{

    // [GET] brand/list
    public function getList(){
        $brand = brand::all();
    	return view('admin.brand.list',['brand'=>$brand]);
    }

    // [GET] brand/add
    public function getAdd(){
        return view('admin.brand.add');
    }
    // [POST] brand/stored
    public function postAdd(Request $req){
        $this->validate($req,[
            'name'=>'required|min:3|unique:brand,name',
            'description'=>'required',
        
          ],[
             'name.required'=>'Bạn chưa nhập tên nhãn hàng',
             'name.min'=>'Tên nhãn hàng phải có ít nhất 3 ký tự',
             'name.unique'=>'Tên nhãn hàng đã tồn tại',
             'description.required'=>'Bạn chưa nhập mô tả',
          ]);
          $brand = new brand;
          $brand -> name = $req -> name;
          $brand -> slug = str_slug($req -> name);
          $brand -> description = $req -> description;
          if($req->hasFile('image'))
          {
              $file = $req->file('image');
  
              $name =$file->getClientOriginalName();
              $image = str_random(10)."_".$name;
              $file->move("upload/brand",$image);
              $brand->image=$image;
  
          }
          else
          {
          $brand->image = "";
          }
          $brand->status=0;

          $brand -> save();
          return redirect('/brand/list')->with('thongbao','Thêm thành công!');

    }

    // [GET]  brand/edit/{id}
    public function getEdit($id){
        $brand =brand::find($id);
        if(!$brand) return view('admin.brand.edit')->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        return view('admin.brand.edit',['brand'=>$brand]);
    }

    // [POST]  brand/update/{id}
    public function postEdit(Request $req,$id){
        $brand=brand::find($id);
        if(!$brand) return redirect('/brand/list')->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        $this->validate($req,[
            'name'=>'required|min:3',
            'description'=>'required',
        
          ],[
             'name.required'=>'Bạn chưa nhập tên nhãn hàng',
             'name.min'=>'Tên nhãn hàng phải có ít nhất 3 ký tự',
             'description.required'=>'Bạn chưa nhập mô tả',
          ]);
          $brand -> name = $req -> name;
          $brand -> slug = str_slug($req -> name);
          $brand -> description = $req -> description;
          if($req->hasFile('image'))
          {
              $file = $req->file('image');
  
              $name =$file->getClientOriginalName();
              $image = str_random(10)."_".$name;
              $file->move("upload/brand",$image);
              unlink("upload/brand/".$brand->image); 
              $brand->image=$image;
  
          }
        
          $brand -> save();

          return redirect('/brand/list')->with('thongbao','Sửa thành công!');
    }

    //[GET] brand/active/{id}
    public function active ($id) {
        $brand = brand::find($id);
        if(!$brand) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        DB::table('brand')
        ->where('id', $id)
        ->update(['status' =>0]);
        return redirect()->back()->with('thongbao','Active nhãn hàng thành công!');
    }

    //[GET] brand/unactive/{id}
    public function unactive ($id) {
        $brand = brand::find($id);
        if(!$brand) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        DB::table('brand')
        ->where('id', $id)
        ->update(['status' =>1]);
        return redirect()->back()->with('thongbao','UnActive nhãn hàng thành công!');
    }


}
