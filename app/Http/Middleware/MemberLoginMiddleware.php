<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberLoginMiddleware
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
        if(Auth::guard('user')->check()){
            $memberID = Auth::guard('user')->user()->id;
            //
            $levelid = DB::table('permission')->select('role_id')->where('user_id','=',$memberID)->get();
            if($levelID = '1'){
              return redirect('admincaptinh/quanli');
              }
            else if($levelID = '2'){
              return redirect('admincaphuyen/quanli');
            } 
            else if($levelID = '3'){
              return redirect('admincapxa/quanli');
            }
            else if($levelID = '4'){
              return redirect('admincaptuvien/quanli');
            }
            else{
              return redirect('nguoidung/quanli');
            }
        }
        else{
             return $next($request);
        }
    }
}
