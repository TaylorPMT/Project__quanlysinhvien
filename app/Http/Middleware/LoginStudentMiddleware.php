<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginStudentMiddleware
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
         if(Auth::check())
        {
            $user=Auth::user();
            if($user->access=1)
            {
         return $next($request);
            }
        }else
        {
            return redirect('loginStudent')->with('erro','Đăng Nhập Không Thành Công');
        }
    }
}
