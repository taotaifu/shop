<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <title>WangID通城——收货地址</title>
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/ziy.css">
    <!--  <script src="js/jquery-1.11.3.min.js" ></script>
    <script src="js/index.js" ></script>  -->
    <!-- <script type="text/javascript" src="js/jquery1.42.min.js"></script> -->

    <!-- <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script> -->
    <!--  <script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.source.js"></script> -->
    <!--  <script type="text/javascript" src="js/select.js"></script> -->
    <script type="text/javascript" src="{{asset ('org/home')}}/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="{{asset ('org/home')}}/js/jquery.reveal.js"></script>

    <script type="text/javascript" src="{{asset ('org/home')}}/js/chengs/jquery.js"></script>
    <script type="text/javascript" src="{{asset ('org/home')}}/js/chengs/bootstrap.js"></script>
    <script type="text/javascript" src="{{asset ('org/home')}}/js/chengs/city-picker.data.js"></script>
    <script type="text/javascript" src="{{asset ('org/home')}}/js/chengs/city-picker.js"></script>
    <script type="text/javascript" src="{{asset ('org/home')}}/js/chengs/main.js"></script>


</head>
<body>
<!--头部-->

<!--头部-->
<div id="header">
    <div class="header-box">
        <h3 class="huany">本地购物商城欢迎您的到来！</h3>
        <ul class="header-left">
            <li class="bj">
                <a class="dib" href="#">贵阳市</a>
                <i class="ci-leftll">
                    <s class="jt">◇</s>
                </i>
                <div class="bj-1">
                    <h3>热门城市：</h3>
                    <a href="">北京</a><a href="">上海</a><a href="">天津</a><a href="">重庆</a><a href="">河北</a><a href="">山西</a><a href="">河南</a><a href="">辽宁</a><a href="">吉林</a><a href="">黑龙江</a><a href="">浙江</a><a href="">江苏</a><a href="">山东</a><a href="">安徽</a><a href="">内蒙古</a><a href="">湖北</a><a href="">湖南</a><a href="">广东</a><a href="">广西</a><a href="">江西</a><a href="">四川</a><a href="">海南</a><a href="">贵州</a><a href="">云南</a><a href="">西藏</a><a href="">陕西</a><a href="">甘肃</a><a href="">青海</a><a href="">宁夏</a><a href="">新疆</a><a href="">台湾</a><a href="">香港</a><a href="">澳门</a><a href="">海外</a><a href="qieh_cs.html">全部+</a>
                </div>
            </li>
        </ul>
        <ul class="header-right">
            @auth()
                <li class="denglu dengl_hou">
                    <div>
                        <a class="red" href="dengl.html">{{auth()->user()->name}}用户</a>
                        <i class="icon_plus_nickname"></i>
                        <i class="ci-leftll">
                            <s class="jt">◇</s>
                        </i>
                    </div>
                    <div class="dengl_hou_xial_k">
                        <div class="zuid_xiao_toux">
                            <a href="#"><img src="{{asset ('org/home')}}/images/toux.png"></a>
                        </div>
                        <div class="huiy_dengj">
                            <a class="tuic_" href="{{route('home.logout')}}">退出</a>
                        </div>
                        <div class="toub_zil_daoh">
                            <a href="">待处理订单</a>
                            <a href="#">我的收藏</a>
                            <a href="{{route ('member.user.index')}}">个人资料</a>
                            <a href="{{route ('admin.index')}}">我的后台</a>
                        </div>
                    </div>
                </li>
                <li class="shu"></li>
                <li class="denglu"><a class="ing_ps" href="#">我的收藏</a></li>
            @else
                <li class="denglu">
                    Hi~<a class="red" href="{{route('home.login')}}">请登录!</a>
                    <a href="{{route ('home.user.create')}}">[免费注册]</a>
                </li>
            @endauth
        </ul>
    </div>
</div>
<div class="hongs_beij">
    <div class="beij_center">
        <div class="wode_tongc_logo">
            <a class="tongc_logo" href="#"></a>
            <a class="fanh_shouy" href="" target="_blank">返回首页</a>
        </div>
        <div class="navitems">
            <ul>
                <li><a href="ger_zhongx.html"><span>首页</span> </a></li>
                <li>
                    <div class="zhangh_dl">
                        <div class="zhangh_dt"><span>账号设置</span><i>◇</i></div>
                        <div class="zhangh_dd">
                            <a href="ger_xinx.html">个人信息</a>
                            <a href="zhangh_anq.html">账户安全</a>
                            <a href="shouh_diz.html">收货地址</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="nav_r">
            <div id="search_2014">
                <div class="form">
                    <input type="text" class="gerzx_text">
                    <button class="button1"></button>
                </div>
            </div>
            <div id="settleup_2014">
                <div class="cw_icon">
                    <a href="gouw_che.html"><span>购物车<em>3</em>件</span></a>
                    <i class="ci-right ">
                        <s class="jt">◇</s>
                    </i>
                </div>
                <div class="dorpdown-layer">
                    <div class="smt"><h4 class="fl">最新加入的商品</h4></div>
                    <ul>
                        <li class="meiyou">
                            <div class="gouwc_tup">
                                <a href="#"><img src="{{asset ('org/home')}}/images/lieb_tupi3.jpg"></a>
                            </div>
                            <div class="gouwc_biaot">
                                <a href="#">探路者TOREAD 情侣款男士三合一套绒冲锋衣 TAWB91603 黑色 </a>
                            </div>
                            <div class="gouwc_shanc">
                                <span>￥50.00</span>
                                <a href="#">删除</a>
                            </div>
                        </li>
                        <li class="meiyou">
                            <div class="gouwc_tup">
                                <a href="#"><img src="{{asset ('org/home')}}/images/lieb_tupi1.jpg"></a>
                            </div>
                            <div class="gouwc_biaot">
                                <a href="#">探路者TOREAD 情侣款男士三合一套绒冲锋衣 TAWB91603 黑色 </a>
                            </div>
                            <div class="gouwc_shanc">
                                <span>￥50.00</span>
                                <a href="#">删除</a>
                            </div>
                        </li>
                        <li class="meiyou">
                            <div class="gouwc_tup">
                                <a href="#"><img src="{{asset ('org/home')}}/images/lieb_tupi2.jpg"></a>
                            </div>
                            <div class="gouwc_biaot">
                                <a href="#">探路者TOREAD 情侣款男士三合一套绒冲锋衣 TAWB91603 黑色 </a>
                            </div>
                            <div class="gouwc_shanc">
                                <span>￥50.00</span>
                                <a href="#">删除</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!---->
<div class="wod_tongc_zhongx">
    <div class="beij_center">
        <div class="myGomeWeb">
            <!--侧边导航-->
            <div class="tod_tongc_zuoc">
                <div class="zuoc_toux">
                    <div class="toux_kuang">
                        <div class="userImage">
                            <div class="myGome_userPhoto">
                                <img src="{{asset ('org/home')}}/images/toux.png">
                                <a class="edit_photo_bitton" href="profile" target="_blank">编辑</a>
                            </div>
                        </div>
                        <div class="user_name_Level">
                            <p class="user_name" title="山的那边是海">{{auth ()->user ()->name}}</p>
                            <p class="userLevel">会员：<span class="levelId icon_plus_nickname"></span></p>
                        </div>
                    </div>
                    <div class="userInfo_bar">
                        <span>资料完成度</span>
                        <span class="userInfo_process_bar"><em class="active_bar" style="width: 40px;"> 20%</em></span>
                        <a href="#" target="_blank">完善</a>
                    </div>
                    <div class="myGome_accountSecurity">
                        <span class="fl_ee" style="margin-top:2px;">账户安全 <em class="myGome_account_level"> 低</em> </span>
                        <div class="verifiBox fl_ee">
                            <div class="shab_1">
                                <span class="myGome_mobile" val="mobile"> <em class=" myGome_onActive "></em> </span>
                                <p class="myGome_verifiPop"><span>您已绑定手机：</span> <span>182****0710</span> <a href="#" target="_blank">管理</a></p>
                            </div>
                            <div class="shab_1">
                                <span class="myGome_email" val="email"> <em class=""></em> </span>
                                <p class="myGome_verifiPop"><span>您还未绑定邮箱 </span><a href="#" target="_blank">立即绑定</a></p>
                            </div>
                        </div>
                        <a class="fl_ee" href="#" target="_blank" style="margin-top:2px;">提升</a>
                    </div>
                    <div class="user_counts">
                        <ul>
                            <li>
                                <div class="count_item">
                                    <a href="#">
                                        <i class="count_icon count_icon01"></i> 待付款
                                        <em id="waitPay">2</em>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="count_item">
                                    <a href="#">
                                        <i class="count_icon count_icon02"></i> 待收货
                                        <em id="waitPay">4</em>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="count_item">
                                    <a href="#">
                                        <i class="count_icon count_icon03"></i> 待提货
                                        <em id="waitPay">0</em>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="count_item">
                                    <a href="#">
                                        <i class="count_icon count_icon04"></i> 待评价
                                        <em id="waitPay">8</em>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wod_tongc_daoh_lieb">
                    <div class="diy_top">
                        <ul>
                            <h3>订单中心</h3>
                            <li><a href="wod_dingd.html">我的订单</a></li>
                            <li><a href="#">退换货单</a></li>
                            <li><a href="#">评价晒单</a></li>
                        </ul>
                        <ul>
                            <h3>管理中心</h3>
                            <li><a href="wod_shouc.html">我的收藏</a></li>
                            <li><a href="#">我的预约</a></li>
                            <li><a href="#">我的咨询</a></li>
                            <li><a href="#">投诉管理</a></li>
                        </ul>
                    </div>
                    <div class="diy_top">
                        <ul>
                            <h3>账户设置</h3>
                            <li><a href="#">基本资料</a></li>
                            <li><a href="#">账户安全</a></li>
                            <li><a href="#">收货地址</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--右边内容-->
            <div class="mod_main">
                <div class="jib_xinx_kuang">
                    <div class="shand_piaot">收货地址</div>
                    @foreach($addresses as $address)
                        <div class="shouh_diz_beij">
                            <div class="shouh_diz_kuang shouh_diz_kuang_mor">
                                <div class="item">
                                    <span class="labal">收件人：</span>
                                    <p>{{$address['name']}}</p>
                                </div>
                                <div class="item">
                                    <span class="labal">所在地区：</span>
                                    <p>{{$address['province']}}</p>
                                </div>
                                <div class="item">
                                    <span class="labal">详细地址：</span>
                                    <p>{{$address['detail']}}</p>
                                </div>
                                <div class="item">
                                    <span class="labal">联系方式：</span>
                                    <p>{{$address['phone']}}</p>
                                </div>
                                <div class="bianj_yv_shanc">
                                    <a href="#" class="mor_color">当前默认地址</a>
                                    <a href="{{route ('home.address.edit',['id'=>$address['id']])}}">编辑</a>
                                    <a href="javascript:;" onclick="del(this)">删除</a>
                                    <form action="{{route ('home.address.destroy',['id'=>$address['id']])}}" method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </div>
                            @endforeach
                            <div class="xinz_shouh_dz_ann">
                                <a href="#" data-reveal-id="myModal">新增收货地址</a>
                            </div>
                        </div>
                </div>
            </div>
            <!--右边内容结束-->
        </div>
    </div>
</div>


<!--新增地址表单-->
<div id="myModal" class="reveal-modal">
    <div class="xint_biaot">
        <h3>新添收货地址</h3>
    </div>
    <form method="post" action="{{route('home.address.store')}}">
        @csrf
        <div class="shouj_diz_b">
            <div class="biaod_1">
                <p><em>*</em>联系人：</p>
                <input type="text" name="name" value="{{old ('name')}}" class="text">
            </div>
            <div class="biaod_1">
                <p><em>*</em>收货地址：</p>
                <div class="xinz_diz_cs">
                    <div class="docs-methods">
                        <form class="form-inline">
                            <div id="distpicker">
                                <div class="form-group">
                                    <div style="position: relative;">
                                        <input id="city-picker3" name="province" class="form-control" readonly type="text" value="北京市/北京市/朝阳区" data-toggle="city-picker">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="biaod_1">
                <p><em>*</em>详细地址：</p>
                <input type="text" name="detail" class="text text1">
            </div>
            <div class="biaod_1 biaod_2">
                <div class="liangp_e">
                    <p><em>*</em>手机号码：</p>
                    <input type="text" name="phone" class="text">
                </div>
            </div>
            <div class="biaod_1">
                <button type="submit" class="diz_baoc">保存</button>
            </div>
        </div>
    </form>
    <a class="close-reveal-modal">&#215;</a>
</div>
<!--底部-->
<div class="dib_beij dib_beij_ger_zhongx">
    <div class="dib_jvz_beij">
        <div class="shangp_baoz">
            <p>本地购物&nbsp;&nbsp;看得见的商品</p>
            <p class="beng1">正品行货&nbsp;&nbsp;购物无忧</p>
            <p class="beng2">低价实惠&nbsp;&nbsp;帮你省钱</p>
            <p class="beng3">本地直发&nbsp;&nbsp;专业配送</p>
        </div>
        <div class="zhongj_youx">
            <div class="lieb_daoh">
                <h4>物流配送</h4>
                <ul>
                    <li><a href="#">配送查询</a></li>
                    <li><a href="#">配送服务</a></li>
                    <li><a href="#">配送费用</a></li>
                    <li><a href="#">配送时效</a></li>
                    <li><a href="#">签收与验货</a></li>
                </ul>
            </div>
            <div class="lieb_daoh">
                <h4>支付与账户</h4>
                <ul>
                    <li><a href="#">货到付款</a></li>
                    <li><a href="#">在线支付</a></li>
                    <li><a href="#">门店支付</a></li>
                    <li><a href="#">账户安全</a></li>
                </ul>
            </div>
            <div class="lieb_daoh">
                <h4>购物帮助</h4>
                <ul>
                    <li><a href="#">购物保障</a></li>
                    <li><a href="#">购物流程</a></li>
                    <li><a href="#">焦点问题</a></li>
                    <li><a href="#">联系我们</a></li>
                </ul>
            </div>
            <div class="lieb_daoh">
                <h4>售后服务</h4>
                <ul>
                    <li><a href="#">退换货服务</a></li>
                    <li><a href="#">退款说明</a></li>
                    <li><a href="#">专业维修</a></li>
                    <li><a href="#">延保服务</a></li>
                    <li><a href="#">家电回收</a></li>
                </ul>
            </div>
            <div class="lieb_daoh">
                <div class="kef_dianh">
                    <p>客服电话</p><span>400-6677-937</span>
                </div>
                <div class="kef_dianh kef_dianh_youx">
                    <p>意见收集邮箱</p>
                    <p>Ask@wangid.com</p>
                </div>
            </div>
            <div class="lieb_daoh lieb_daoh_you">
                <div class="erw_ma_beij">
                    <div class="erw_m">
                        <h1><img src="{{asset ('org/home')}}/images/mb_wangid.png"></h1>
                        <span>扫码下载通城客户端</span>
                    </div>
                    <div class="erw_m">
                        <h1><img src="{{asset ('org/home')}}/images/mb_wangid.png"></h1>
                        <span>扫码下载通城客户端</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="beia_hao">
            <p>京ICP备：14012449号 黔ICP证：B2-20140009号 </p>
            <p class="gonga_bei">京公网安备：11010602030054号</p>
            <div class="renz_">
                <span></span>
                <span class="span1"></span>
                <span class="span2"></span>
                <span class="span3"></span>
            </div>
        </div>
    </div>
</div>

@include('layouts.message')
<script>
    function del(obj) {
        swal("确定删除吗？", {
            buttons: {
                cancel: "取消",
                catch: {
                    text: "确定",
                    value: "catch",
                },
            },
        })
            .then((value) => {
                switch (value) {
                    case "catch":
                        $(obj).next('form').submit();
                        break;
                    default:
                }
            });
    }
</script>

</body>
</html>


