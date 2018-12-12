<?php

namespace App\Http\Middleware;

use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Closure;

class AdminAuthMiddleware
{
    public function handle($request,Closure $next){

        //验证是否登录后台
      if(!auth ('admin')->check ()){
           return redirect ()->route ('admin.login');
      }
      return $next($request);
    }
}
