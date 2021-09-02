<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use App\Mail\VerifyEmail;
use App\Mail\ForgotPassword;

use App\Event;
use App\User;
use App\VerifyUser;


class UserController extends Controller

{

  // [GET] user/user
  public function getUser() {
    $user=User::all()->where('quyen',1);
    return view('admin.user.userlist',['user'=>$user]);

  }

  // [GET] user/admin
  public function getAdmin() {
    $user=User::all()->where('quyen',0);
    return view('admin.user.adminlist',['user'=>$user]);
  }

  // [GET] user/delete/{id}
  public function delete($id) {
    $user=User::find($id);
    if($user) {
      $user->delete();
      return redirect()->back()->with('thongbao','Xóa Người Dùng Thành Công!');
    }
    else
      return redirect()->back()->with('thongbao','Lỗi Hệ Thống Xin Vui Lòng Thử Lại!');

  }

  // [GET] admin/add
  public function getAdd() {
    return view('admin.user.add');

  }

  // [POST] admin/add
  public function postAdd(Request $request) {
    $this->validate($request,[
      'name'=>'required|min:3',
      'email'=>'required|email|unique:users,email',
      'password'=>'required|min:6|max:32',
      'passwordAgain'=>'required|same:password' 

    ],[
       'name.required'=>'Bạn chưa nhập tên người dùng',
       'name.min'=>'Tên người dùng phải có ít nhất 6 ký tự',
       'email.required'=>'Bạn chưa nhập Email',
       'email.email'=>'Bạn chưa nhập đúng định dạng Email',
       'email.unique'=>'Email đã tồn tại',
       'passwod.required'=>'Bạn chưa nhập mật khẩu',
       'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự và nhiều nhất 32 ký tự',
       'password.max'=>'Mật khẩu phải có ít nhất 6 ký tự và nhiều nhất 32 ký tự',
       'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
       'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng'
    ]);

      $user =new User;
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=bcrypt($request->password);
      $user->quyen=0;
      $user->code = Str::random(20);
      $user->save();


      $verify = new  VerifyUser;
      $verify -> token = Str::random(60);
      $verify->user_id = $user->id;
      $verify->save();

      Mail::to($user->email)->send(new VerifyEmail($user));

      return redirect()->back()->with('thongbao','Đăng ký thành công. Xin vui lòng truy cập vào email để xác thực tài khoản');

  }

    // [GET] forgot

    public function getForm(){
      return view('forgot');
    }
  
    // [POST] forgot
    public function postForm(Request $request){
      $this->validate($request,[
        'email'=>'required|email',
      ],[
        'email.required'=>'Bạn chưa nhập Email',
        'email.email'=>'Bạn chưa nhập đúng định dạng Email',

      ]);

      $user = User::where('email',$request->email)->first();
      if(isset($user)) {
        
        Mail::to($user->email)->send(new ForgotPassword($user));

        return redirect('forgot')->with('thongbao','Gửi yêu cầu thành công. Xin vui lòng  truy cập vào email để xác nhận đổi mật khẩu');
      }
      else 
        return redirect('forgot')->with('thongbao','Tài khoản email không tồn tại hoặc không đúng');
      }
    
    // [GET] forgotpassword/{id}
      public function resetPassword ($code) {
        $user=User::where('code',$code)->first();
        if(isset( $user)) {
          $user->password = bcrypt(123456789);
          $user->save();
            return redirect('login')->with('thongbao','mật khẩu mới của bạn là: 123456789');
        }
        else {
            return redirect('forgot')->with('thongbao','Có lỗi xảy ra xin vui lòng thực hiện lại');

        }
      }


    // [GET] register
      public function getRegister(){
          return view('register');
      }

    // [POST] register
      public function postRegister(Request $request){
          $this->validate($request,[
              'name'=>'required|min:3',
              'email'=>'required|email|unique:users,email',
              'password'=>'required|min:6|max:32',
              'passwordAgain'=>'required|same:password' 

            ],[
              'name.required'=>'Bạn chưa nhập tên người dùng',
              'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
              'email.required'=>'Bạn chưa nhập Email',
              'email.email'=>'Bạn chưa nhập đúng định dạng Email',
              'email.unique'=>'Email đã tồn tại',
              'passwod.required'=>'Bạn chưa nhập mật khẩu',
              'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự và nhiều nhất 32 ký tự',
              'password.max'=>'Mật khẩu phải có ít nhất 6 ký tự và nhiều nhất 32 ký tự',
              'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
              'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng'
            ]);

          $user =new User;
          $user->name=$request->name;
          $user->email=$request->email;
          $user->password=bcrypt($request->password);
          $user->quyen=1;
          $user->phone="";
          $user->code = Str::random(20);
          $user->save();


          $verify = new  VerifyUser;
          $verify -> token = Str::random(60);
          $verify->user_id = $user->id;
          $verify->save();

          Mail::to($user->email)->send(new VerifyEmail($user));

          return redirect('login')->with('thongbao','Đăng ký thành công. Xin vui lòng truy cập vào email để xác thực tài khoản');
      }

    
      // [GET] verify/{token}
      public function verifyEmail ($token) {
          $verifyUser = VerifyUser::where('token',$token)->first();
          if(isset($verifyUser)) {
            $user = $verifyUser ->user;
            if(!$user->email_verified_at) {
              $user->email_verified_at = Carbon::now();
              $user->save();
              return redirect('login')->with('thongbao','Xác thực tài khoản thành công');


            }
            else {
              return redirect()->back()->with('thongbao','Tài khoản của bạn đang chờ xác thực');
            }
          }
          else {
            return redirect('login')->with('thongbao','Có lỗi xảy ra vui lòng thực hiện lại');

          }

      }

     // [GET] login

      public function getLogin(){
          return view('login');
      }

      // [POST] login
      public function postLogin(Request $request){
          $this->validate($request,[
              'email'=>'required',
              'password'=>'required|min:3|max:32'
            ],[
              'email.required'=>'Bạn chưa nhập email',
              'password.required'=>'Bạn chưa nhập mật khẩu',
              'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự và nhiều nhất 32 ký tự',
              'password.max'=>'Mật khẩu phải có ít nhất 6 ký tự và nhiều nhất 32 ký tự'
            ]);

            $arr=[
              'email'=>$request->email,
              'password'=>$request->password 
            ];
            
          if(Auth::attempt($arr)){
                if(Auth::user()->email_verified_at==null) {
                  Auth::logout();
                  return redirect('login')->with('thongbao','Bạn chưa xác thực tài khoản, vui lòng xác thực bằng đường dẫn gửi trong email');
                }
              
                if(Auth::user()->quyen==0)
                    return redirect('/dashboard');
                else {
                  return redirect('/trangchu');

                }
        
                
            }
            else
                return redirect('login')->with('thongbao','Sai thông tin tài khoản hoặc mật khẩu!');
      }

     // [GET] logout
      public function getLogout(){
          Auth::logout();
          return redirect('login')->with('thongbao','Đăng xuất thành công!');
      }

     // [GET] edit/{code}
      public function edit($code){  
          $user= User::where('code',$code)->first();
          if($user) {
              return view('admin.adminSetting',['user'=>$user]);
          }
          else
            return redirect()->back();
      }

    // [POST] update/{code}
      public function stored(Request $request,$code){
        $this->validate($request,[
          'name'=>'required',
        ],[
          'name.required'=>'Bạn chưa nhập tên người dùng',
        ]);
        $user= User::where('code',$code)->first();
          if($user) {
            $user->name=$request->name;
            if($request->phone) {
              $user->phone=$request->phone;
            }
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
    
                $name =$file->getClientOriginalName();
                $image = str_random(10)."_".$name;
                $file->move("upload/user",$image);
                // unlink("upload/user/".$user->image); 
                $user->image=$image;
    
            }
          
            $user -> save();
            return redirect()->back()->with('thongbao','Sửa thành công!');
            
          }
          else
            return redirect()->back();
    }
      // [GET] resetad/{code}
      public function getresetad($code) {
        $user= User::where('code',$code)->first();
            if($user) {
                return view('admin.adminreset');
            }
            else
              return redirect()->back();
      }

      // [POST] storedad/{code}
      public function storedad($code, Request $request) {
        $this->validate($request,[
          'password'=>'required|min:6|max:32',
          'passwordAgain'=>'required|same:password' 

        ],[ 
          'passwod.required'=>'Bạn chưa nhập mật khẩu',
          'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự và nhiều nhất 32 ký tự',
          'password.max'=>'Mật khẩu phải có ít nhất 6 ký tự và nhiều nhất 32 ký tự',
          'passwordAgain.required'=>'Bạn chưa nhật lại mật khẩu',
          'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'
        ]);


            $user= User::where('code',$code)->first();
            if(isset($user)) {
              $user->password=bcrypt($request->password);
              $user->save();
              return redirect()->back()->with('thongbao','Đổi mật khẩu thành công thành công!');

            }
            else 
                return redirect()->back()->with('thongbao','Lỗi server xin vui long thử lại!');
        }

  


  
  



}
