<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminLoginMiddleware
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
        if(Session::get('nguoi_dung') && Session::get('nguoi_dung.ma_quyen') != 3){
            return $next($request);
        }else{
            return redirect()->route('adminLogin');
        }
    }
}
