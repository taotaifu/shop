<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

     //登录页面
    public function index(){

        return view ('admin.login.index');
    }

    //登录提交
  public function login(LoginRequest $request){
      if (Auth::guard ('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
          //dd ('1');
          return redirect ()->route ('admin.index')->with ('success','登录成功');
      }
      return redirect ()->back ()->with ('success','用户名/密码不正确');
  }

  //提出登录
    public  function logout(){
        Auth::guard ('admin')->logout();
        return redirect ()->route ('admin.login');
    }
}
