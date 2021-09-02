<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            $user = Auth::user();
            if($user -> email_verified_at==null) {
                return redirect('login')->with('thongbao','Bạn chưa xác thực tài khoản, vui lòng xác thực bằng đường dẫn gửi trong email');
            }
            else 
            {
                if($user->quyen==0) {
                    return $next($request);
         
                 }
                 else {
                   return redirect('/trangchu');
         
                 }

            }
        }   
        else
             return redirect('login')->with('thongbao','Bạn chưa đăng nhập!');

    }
}
