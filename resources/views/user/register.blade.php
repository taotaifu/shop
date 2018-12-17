<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <title>WangID通城——个人注册</title>
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/ziy.css">
    <script src="{{asset ('org/home')}}/js/jquery-1.11.3.min.js" ></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

        });
    </script>
</head>
<body>
<!--dengl-->
<div class="yiny">
    <div class="beij_center">
        <div class="dengl_logo">
            <img src="{{asset('org/home')}}/images/logo_1.png">
            <h1>欢迎注册</h1>
        </div>
    </div>
</div>
<div class="beij_center">
    <div class="ger_zhuc_beij">
        <div class="ger_zhuc_biaot">
            <ul>
                <li class="ger_border_color"><a>个人注册</a></li>
                <i>丨</i>
                <li><a href="{{route ('password_reset')}}">申请重置密码</a></li>
                <p>我已经注册，现在就<a class="ftx-05 ml10" href="{{route ('login')}}">登录</a></p>
            </ul>
        </div>
        <div class="zhuc_biaod">
            {{--form表单--}}
            <form action="{{route ('register')}}" method="post">
                @csrf
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">用户名：</label>
              	</span>
                    <input class="i-text" type="text" name="name" placeholder="请输入用户名">
                    <!--备注————display使用 inline-block-->
                    <div class="msg-box">
                        <div class="msg-box" style="display: none;">
                            <div class="msg-weak" style="display: inline-block;"><i></i>
                                <div class="msg-cont">4-20个字符，支持汉字、字母、数字及“-”、“_”组合</div>
                            </div>
                        </div>
                        <div class="msg-weak err-tips" style="display: none;">
                            <div>请输入用户名</div>
                        </div>
                    </div>
                    <span class="suc-icon" style="display: none"></span>
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">设置密码：</label>
              	</span>
                    <input class="i-text" type="password" name="password" placeholder="请输入密码">
                    <!--备注————display使用 inline-block-->
                    <div class="msg-box">
                        <div class="msg-box" style="display: none;">
                            <div class="msg-weak" style="display: inline-block;"><i></i>
                                <div class="msg-cont">键盘大写锁定已打开，请注意大小写!</div>
                            </div>
                        </div>
                        <div class="msg-weak err-tips" style="display:none;">
                            <div>请输入密码</div>
                        </div>
                    </div>
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">确认密码：</label>
              	</span>
                    <input class="i-text" type="password" name="password_confirmation" placeholder="请输入确认密码">
                    <!--备注————display使用 inline-block-->
                    <div class="msg-box">
                        <div class="msg-weak err-tips" style="display: none;">
                            <div>密码不一样</div>
                        </div>
                    </div>
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">邮箱账号：</label>
              	</span>
                    <input class="i-text box" type="email" value="729589198@qq.com" name="email" placeholder="请输入邮箱">
                    <!--备注————display使用 inline-block-->
                    <div class="msg-box">
                        <div class="msg-weak err-tips" style="display:none;">
                            <div>邮箱号不能为空</div>
                        </div>
                    </div>
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">验证码：</label>
              	</span>
                    <input class="i-text i-short" type="text" placeholder="请输入验证码" name="code" value="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="check check-border" style="position:relative;left:0">
                        <a href="javascript:;" class="check-phone" onclick="code()" style="padding:11px 10px 14px 10px;*line-height:60px;">获取验证码</a>
                        <span class="check-phone disable" style="display: none;"><em>60</em>秒后重新获取</span>
                        <a class="check-phone" style="display: none;padding:11px 10px 14px 10px">重新获取验证码</a>
                    </div>
                    <!--备注————display使用 inline-block-->
                    <div class="msg-box">
                        <div class="msg-weak err-tips" style="display:none;">
                            <div>请输入验证码</div>
                        </div>
                    </div>
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name"> </label>
              	</span>
                    <div class="dag_biaod">
                        <input type="checkbox" value="english">
                        阅读并同意
                        <a href="#" class="ftx-05 ml10">《wangdi通城用户注册协议》</a>
                        <a href="#" class="ftx-05 ml10">《隐私协议》</a>
                    </div>
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name"> </label>
              	</span>
                    <button class="reg-btn" value="立即注册" type="submit">立即注册</button>
                </div>
            </form>
        </div>
        <div class="xiaogg">
            <img src="{{asset('org/home')}}/images/cdsgfd.jpg">
        </div>
    </div>
</div>


<div class="jianj_dib jianj_dib_1">
    <div class="beia_hao">
        <p>京ICP备：14012449号 黔ICP证：B2-20140009号 </p>
        <p class="gonga_bei">京公网安备：11010602030054号</p>
    </div>
</div>
@include('layouts.message')
<script src="{{asset ('org/layer/layer.js')}}"></script>
<script src="https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    function code() {
        var email = $('.box').val()
        // alert('1')
        $.post("{{route ('util.code.send')}}",{email:email},function(res){
            // console.log(res)
            if (res.code==1) {
                swal({
                    text: res.message,
                    icon: "success"
                });
            }
        },'json')

    }
</script>
</body>
</html>
