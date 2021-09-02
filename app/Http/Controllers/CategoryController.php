<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Event;
use App\category;

class CategoryController extends Controller
{

    // [GET] category/list
    public function getList(){
        $category = category::all();
    	return view('admin.category.list',['category'=>$category]);
    }

    // [GET] category/add
    public function getAdd(){
        return view('admin.category.add');
    }

    // [GET] category/stored
    public function postAdd(Request $req){
        $this->validate($req,[
            'name'=>'required|unique:category,name',
            'description'=>'required',
        
          ],[
             'name.required'=>'Bạn chưa nhập tên thể loại',
             'name.unique'=>'Tên thể loại đã tồn tại',
             'description.required'=>'Bạn chưa nhập mô tả',
          ]);
          $category = new category;
          $category -> name = $req -> name;
          $category -> slug = str_slug($req -> name);

          $category -> description = $req -> description;
          $category -> status = 0;

          $category -> save();
          return redirect('/category/list')->with('thongbao','Thêm thành công!');

    }

    // [GET] category/edit/{id}
    public function getEdit($id){
        $category =category::find($id);
        if(!$category) return view('admin.category.edit')->with('thongbao','Lỗi hệ thống xin vui lòng thử lại');
        return view('admin.category.edit',['category'=>$category]);
    }

    // [POST] category/update/{id}
    public function postEdit(Request $req,$id){
        $category = category::find($id);
        if(!$category) return redirect('/category/list')->with('thongbao','Lỗi hệ thống xin vui lòng thử lại');
        $this->validate($req,[
            'name'=>'required',
            'description'=>'required',
        
          ],[
             'name.required'=>'Bạn chưa nhập tên thể loại',
             'description.required'=>'Bạn chưa nhập mô tả',
          ]);
        $category -> name = $req -> name;
        $category -> slug = str_slug($req -> name);
        $category -> description = $req -> description;
        $category -> save();
        return redirect('/category/list')->with('thongbao','Sửa thành công!');
    
    }

    // [GET] category/active/{id}
    public function active ($id) {
        $category = category::find($id);
        if(!$category) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        DB::table('category')
        ->where('id', $id)
        ->update(['status' =>0]);
        return redirect()->back()->with('thongbao','Active thể loại thành công!');
    }

    // [GET] category/unactive/{id}
    public function unactive ($id) {
        $category = category::find($id);
        if(!$category) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        DB::table('category')
        ->where('id', $id)
        ->update(['status' =>1]);
        return redirect()->back()->with('thongbao','UnActive thể loại thành công!');
    }

}
