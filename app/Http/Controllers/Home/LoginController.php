<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\HomeLoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function index ()
    {
        return view ( 'home.login.login' );
    }

    //加载登录页面
  public function login(HomeLoginRequest $request){

      if ( \Auth::attempt ( ['email' => $request->email , 'password' => $request->password] , $request->remember ) )
      {

          return redirect ( $request->query ( 'from' ) ?: '/' )->with ( 'success' , '登录成功' );
      }

      return back ()->with ( 'danger' , '账号不存在或密码错误' );


  }
    //注销登录
    public function logout ( Request $request )
    {
        \Auth::logout ();

        return redirect ( $request->query ( 'from' ) ?: '/' )->with ('success','退出成功');
    }

}
