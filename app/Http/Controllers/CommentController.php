<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;

use App\comments;
use App\product;
use Auth;

class CommentController extends Controller
{
    // [GET] comment/index
    public function index () {
        $comments = comments::all();
        return view('admin.comment.list',['comments'=>$comments]);
    }

    // [GET] comment/delete/{id}
    public function getDelete ($id) {
        $comments = comments::find($id);
        if($comments) {
            $comments->delete();
            return redirect()->back()->with('thongbao','Xóa Bình Luận Thành Công');

        }
        else
            return redirect()->back()->with('thongbao','Lỗi Hệ Thống Xin Vui Lòng Thử Lại');
    }
}
