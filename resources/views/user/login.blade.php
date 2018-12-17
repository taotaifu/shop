<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/ziy.css">
</head>
<body>
<!--dengl-->
<div class="beij_center">
    <div class="dengl_logo">
        <img src="{{asset('org/home')}}/images/logo_1.png">
        <h1>欢迎登录</h1>
    </div>
</div>
<div class="dengl_beij">

    <div class="banner_xin">
        <img src="{{asset('org/home')}}/images/ss.jpg">
    </div>
    <div class="beij_center dengl_jvz">
        <form action="{{route ('login')}}" method="post">
            @csrf
            <div class="login_form">
                <div class="login_tab">
                    <h2>欢迎登录</h2>
                    <div class="dengl_erwm">
                        <a href="#"><img src="{{asset('org/home')}}/images/er_wm.png"></a>
                        <div class="tanc_erwm_kuang">
                            <img src="{{asset('org/home')}}/images/mb_wangid.png">
                            <div class="qrcode_panel">
                                <ul>
                                    <li class="fore1">
                                        <span>打开</span>
                                        <a href="#" target="_blank"> <span class="red">手机通城</span></a>
                                    </li>
                                    <li>扫描二维码</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kengl_kuang">
                    <div class="txt_kuang">
                        <input type="email" name="email" value="729589198@qq.com" class="itxt" placeholder="请输入邮箱">
                        <input type="password" name="password" class="itxt" placeholder="密码">
                    </div>
                    <div class="remember">
                        <div class="fl">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" value="1">
                            <label  for="remember">自动登录</label>
                        </div>
                        <div class="fr">
                            <a href="{{route ('password_reset')}}" class="fl" target="_blank" title="忘记密码">忘记密码?</a>
                        </div>
                    </div>
                    <button class="btnnuw" type="submit">登录</button>
                </div>
                <div class="corp_login">
                    <div class="regist_link"><a href="{{route ('register')}}" target="_blank"><b></b>立即注册</a></div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="jianj_dib">
    <div class="beia_hao">
        <p>京ICP备：14012449号 黔ICP证：B2-20140009号 </p>
        <p class="gonga_bei">京公网安备：11010602030054号</p>
    </div>
</div>
@include('layouts.message')
</body>
</html>
