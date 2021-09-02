<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;

use Illuminate\Http\Request;
use App\Event;
use App\news;
class NewsController extends Controller
{
    //  [GET] news/index
    public function index() {
        $news = news::all();
        return view('admin.news.list',['news'=>$news]);
    }

    // [GET] news/add
    public function add() {
        return view('admin.news.add');
    }

    // [POST] news/add
    public function addstored(Request $request) {
        $this->validate($request,[
            'name'=>'required|min:5',
            'content'=>'required',
            'image'=>'required'
          ],[
             'name.required'=>'Bạn chưa nhập tên bản tin',
             'name.min'=>'Tên bản tin phải có ít nhất 5 ký tự',
             'content.required'=>'Bạn chưa nhập nội dung',
             'image.required'=>'Bạn chưa chọn hình ảnh'

            
          ]);

        $news = new news;
        $news->name = $request->name;
        $news->content = $request->content;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $name =$file->getClientOriginalName();
            $image = str_random(10)."_".$name;
            $file->move("upload/news",$image);
            $news->image=$image;

        }
        else
        {
        $news->image = "";
        }
        $news->save();

        return redirect()->back()->with('thongbao','Thêm Bản Tin Thành Công!');

    }

    // [GET] news/edit/{id}
    public function edit( $id) {
        $news = news::find($id);
        if(!$news) redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        return view('admin.news.edit',['news'=>$news]);
    }

    // [POST] news/edit/{id}
    public function editstored(Request $request,$id) {
        $this->validate($request,[
            'name'=>'required|min:5',
            'image'=>'required'
          ],[
             'name.required'=>'Bạn chưa nhập tên bản tin',
             'name.min'=>'Tên bản tin phải có ít nhất 5 ký tự',
             'image.required'=>'Bạn chưa chọn hình ảnh'

          ]);

        $news = news::find($id);
        if($news) {
            $news->name = $request->name;
            $news->content = $request->content;

            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $name =$file->getClientOriginalName();
                $image = str_random(10)."_".$name;
                $file->move("upload/news",$image);
                $news->image=$image;

            }
            $news->save();

            return redirect('/news/index')->with('thongbao','Sửa Bản Tin Thành Công!');
        }
        else
             return redirect('/news/index')->with('thongbao','Lỗi Hệ Thống xin vui lòng thử lại!');

    }

    // [GET] news/delete/{id}
    public function delete($id) {
        $news = news::find($id);
        if($news) {
            $news->delete();
            return redirect('/news/index')->with('thongbao','Xóa Bản Tin Thành Công!');

        }
        else
             return redirect('/news/index')->with('thongbao','Lỗi Hệ Thống xin vui lòng thử lại!');
    }

}
