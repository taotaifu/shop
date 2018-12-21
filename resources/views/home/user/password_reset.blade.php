
<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <title>WangID通城——个人注册</title>
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/ziy.css">
    <!--  <script src="js/jquery-1.11.3.min.js" ></script>
    <script src="js/index.js" ></script>  -->
    <!-- <script type="text/javascript" src="js/jquery1.42.min.js"></script> -->
    <!--
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
     <script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.source.js"></script> -->

</head>
<body>
<!--dengl-->
<div class="yiny">
    <div class="beij_center">
        <div class="dengl_logo">
            <img src="{{asset('org/home')}}/images/logo_1.png">
            <h1>密码重置</h1>
        </div>
    </div>
</div>
<div class="beij_center">
    <div class="ger_zhuc_beij">
        <div class="ger_zhuc_biaot">
            <ul>
                <li><a>密码重置</a></li>
                <p>我已经密码重置，现在就<a class="ftx-05 ml10" href="{{route('login')}}">登录</a></p>
            </ul>
        </div>
        <div class="zhuc_biaod zhuc_biaod_liuy">
            <form action="#" method="get" class="messages">
                <div class="messlist">
                    <label><em>*</em> 联系邮箱</label>
                    <input type="text" placeholder="邮箱" />
                    <div class="clears"></div>
                </div>
                <div class="messlist">
                    <label><em>*</em>密码</label>
                    <input type="password" placeholder="密码" />
                    <div class="clears"></div>
                </div>
                <div class="messlist">
                    <label><em>*</em>第二次密码</label>
                    <input type="password" placeholder="第二次密码" />
                    <div class="clears"></div>
                </div>
                <div class="messlist yzms">
                    <label><em>*</em> 验证码</label>
                    <input type="text" placeholder="验证码" />
                    <div class="input-group-append">
                        <button  style="height: 30px" class="btn btn-outline-secondary" type="button" id="bt">发送验证码</button>
                    </div>
                    <div class="clears"></div>
                </div>
                <div class="messsub">
                    <input class="reg-btn" type="submit" value="提交"/>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="jianj_dib jianj_dib_1">
    <div class="beia_hao">
        <p>京ICP备：14012449号 黔ICP证：B2-20140009号  </p>
        <p class="gonga_bei">京公网安备：11010602030054号</p>
    </div>
</div>

</body>
</html>
