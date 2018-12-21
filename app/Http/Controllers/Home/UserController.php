<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\RegisterRequest;
use App\Notifications\ResetPasswordNotification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        //接收说有的请求数据
        $data =$request->all ();
        //将密码加密
        $data['password']=bcrypt ($data['password']);
        //给每个用户昵称
        $data['name']=$data['name']?:'';
        //给每个进来的用户给个随机字符串
        $data['token']=str_random ('30');
        //修改表中的email_verified_at 字段 获取当前的时间
        $data['email_verified_at']=now ();
        //将数据写入数据表中
        $user=User::create('data');
        //修改用户默认昵称 统一用 用户xx
        $user->name=$user['id'] .'用户';
        //加载模板
        return redirect ()->route ('home.login')->with ('success','注册成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    //忘记密码
    public function forgetPasswordView(){

        return view ('home.user.forget_password');

    }
    //重置密码发送邮件
    public function forgetPassword(Request $request){

        //进行表单验证
        $this->validate( $request , [ 'email'=>'required|email' ] , [
            'email.required'=>'请输入邮箱' ,
            'email.email'   =>'邮箱格式不正确'
        ] );
        //根据用户提交来的邮箱去数据表查找数据
        $user=User::where( 'email' , $request->email )->first();
        //dd($user);
        if( $user ){
            //发邮件
            $user->notify( new ResetPasswordNotification( $user->token ) );

            return back()->with( 'success' , '邮件发送成功' );
        }

        return back()->with( 'danger' , '该邮箱未注册' );


    }

    //收到邮件之后点击链接进行密码重置
    public function resetPasswordView( $token )
    {
        $user=User::where( 'token' , $token )->first();
        if( !$user ){
            return redirect( '/' );
        }

        return view( 'home.user.reset_password' ,compact('token'));
    }

    public function resetPassword($token, Request $request )
    {
        $this->validate($request,['password'=>'required|confirmed'],['password.required'=>'请输入新密码','password.confirmed'=>'两次输入密码不一致']);
        $user=User::where( 'token' , $token )->first();
        if( !$user ){
            return redirect( '/' );
        }
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('home.login')->with('success','密码修改成功');
    }

}
