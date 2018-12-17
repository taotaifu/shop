<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //加载登录
    public function login ( Request $request )
    {
       //dd ($request->all ());
        return view ( 'user.login' );
    }

    //登录提交
    public function loginForm ( Request $request )
    {
         //dd (1);
        //后台验证
        $this->validate ($request,[
            'email'   =>'email' ,
            'password'=>'required|min:6'
        ],[
            'email.email'=>'请输入邮箱',
            'password.required'=>'请输入登录密码',
            'password.min'=>'输入的密码不得少于6位'
        ]);
        //执行认证
        $credentials=$request->only( 'email' , 'password' );
        if(\Auth::attempt( $credentials , $request->remember ) ){
            //登录成功，跳转到首页
            if( $request->from ){
                return redirect( $request->from )->with( 'success' , '登录成功' );
            }

            return redirect( '/')->with( 'success' , '登录成功' );
        }
        return redirect()->back()->with( 'danger' , '用户名密码不正确' );
    }


    //加载注册
    public function register ()
    {
        return view ( 'user.register' );
    }

    public function store( RegisterRequest $request )
    {
        //dd($request->all());
        //将数据存储到数据表
        $data              =$request->all();
        $data[ 'password' ]=bcrypt( $data[ 'password' ] );
        User::create( $data );
        //模型事件，需要再注册之后，把email_verified_at字段事件自动处理
        //提示并且跳转
        return redirect()->route( 'login' )->with( 'success' , '注册成功' );
    }


    //加载重置密码
    public function passwordReset ()
    {
        return view ( 'user.password_reset' );
    }
}
