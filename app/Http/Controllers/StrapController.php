<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Event;
use App\strap;

class StrapController extends Controller
{
    // [GET] strap/list
    public function getList(){
        $strap = strap::all();
    	return view('admin.strap.list',['strap'=>$strap]);
    }

    // [GET] strap/add
    public function getAdd(){
        return view('admin.strap.add');
    }

    // [POST] strap/stored
    public function postAdd(Request $req){

        $this->validate($req,[
            'name'=>'required|min:3|unique:strap,name',
            'description'=>'required',
        
          ],[
             'name.required'=>'Bạn chưa nhập tên dây đeo',
             'name.min'=>'Tên dây đeo phải có ít nhất 3 ký tự',
             'name.unique'=>'Tên dây đeo đã tồn tại',
             'description.required'=>'Bạn chưa nhập mô tả',
          ]);
          $strap = new strap;
          $strap -> name = $req -> name;
          $strap -> slug = str_slug($req -> name);
          $strap -> description = $req -> description;
          $strap -> status = 0;

          $strap -> save();
          return redirect('/strap/list')->with('thongbao','Sửa thành công!');

    }

    // [GET] strap/edit/{id}
    public function getEdit($id){
        $strap =strap::find($id);
        if(!$strap) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        return view('admin.strap.edit',['strap'=>$strap]);
    }

    // [POST] strap/update/{id}
    public function postEdit(Request $req,$id){
        $this->validate($req,[
            'name'=>'required|min:3',
            'description'=>'required',
        
          ],[
             'name.required'=>'Bạn chưa nhập tên dây đeo',
             'name.min'=>'Tên dây đeo phải có ít nhất 3 ký tự',
             'description.required'=>'Bạn chưa nhập mô tả',
          ]);
          $strap = strap::find($id);
          $strap -> name = $req -> name;
          $strap -> slug = str_slug($req -> name);
          $strap -> description = $req -> description;
          $strap -> save();
          return redirect('/strap/list')->with('thongbao','Thêm thành công!');
    }

    // [GET] strap/active/{id}
    public function active ($id) {
        $strap = strap::find($id);
        DB::table('strap')
        ->where('id', $id)
        ->update(['status' =>0]);
        return redirect()->back()->with('thongbao','Active dây đeo thành công!');
    }

    // [GET] strap/unactive/{id}
    public function unactive ($id) {
        $strap = strap::find($id);
        DB::table('strap')
        ->where('id', $id)
        ->update(['status' =>1]);
        return redirect()->back()->with('thongbao','UnActive dây đeo thành công!');
    }
}
