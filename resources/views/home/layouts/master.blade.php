<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>默书彤商城</title>
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/ziy.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/zxx.lib.css">
    <link rel="stylesheet" href="{{asset ('org/layui/css/layui.css')}}">
    <script src="{{asset ('org/home')}}/js/jquery-1.11.3.min.js"></script>
    <script src="{{asset ('org/home')}}/js/index.js"></script>

@stack('css')
@stack('js')
<!-- <script type="text/javascript" src="js/jquery1.42.min.js"></script> -->
    {{--//   <script type="text/javascript" src="{{asset ('org/home')}}/js/jquery-1.11.1.min.js"></script>--}}
    <script type="text/javascript" src="{{asset ('org/home')}}/js/jquery.SuperSlide.2.1.1.source.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link href="https://cdn.bootcss.com/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">--}}
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
    </script>
</head>
<body>
<!--侧边-->
<div class="jdm-toolbar-wrap J-wrap">
    <div class="jdm-toolbar J-toolbar">
        <div class="jdm-toolbar-panels J-panel"></div>
        <div class="jdm-toolbar-tabs J-tab">
            <div data-type="bar" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-ger">
                <i class="tab-ico"></i>
                <em class="tab-text">购物车</em>
            </div>
            <div data-type="bar" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-cart">
                <i class="tab-ico"></i>
                <em class="tab-text">购物车</em>
            </div>
            <div data-type="bar" clstag="h|keycount|cebianlan_h_follow|btn" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-follow" data-name="follow" data-login="true">
                <i class="tab-ico"></i>
                <em class="tab-text">我的关注</em>
            </div>
        </div>
        <div class="J-trigger jdm-toolbar-tab jdm-tbar-tab-message" data-name="message"><a target="_blank" href="#">
                <i class="tab-ico"></i>
                <em class="tab-text">我的消息
                </em></a>
        </div>
    </div>
    <div class="jdm-toolbar-footer">
        <div data-type="link" id="#top" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-top">
            <a href="#" clstag="h|keycount|cebianlan_h|top">
                <i class="tab-ico"></i>
                <em class="tab-text">顶部</em>
            </a>
        </div>
    </div>
    <div class="jdm-toolbar-mini"></div>
    <div id="J-toolbar-load-hook" clstag="h|keycount|cebianlan_h|load"></div>
</div>


<!--头部-->
<div id="header">
    <div class="header-box">
        <h3 class="huany" style="font-size: 10px">购物商城欢迎您,祝您购物愉快！</h3>
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
                            <a href="#"><img src="{{auth ()->user ()->icon}}"></a>
                        </div>
                        <div class="huiy_dengj">
                            <a class="tuic_" href="{{route('home.logout')}}">退出</a>
                        </div>
                        <div class="toub_zil_daoh">
                            <a href="{{route ('home.personal_center.index')}}">我的订单</a>
                            <a href="#">我的收藏</a>
                            <a href="{{route ('home.material_center.index')}}">个人中心</a>
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
<!--搜索栏-->
<div class="toub_beij">
    <div class="logo"><a href=""><img src="{{asset ('org/home')}}/images/logo.png"></a></div>
    <div class="search seach fl">
        <form action="{{route('home.search')}}">
            <input type="text" name="kwd" value="{{request()->query('kwd')}}" placeholder="照相机" class="seachtxt fl text" id="textt">
            <button class="button">搜索</button>
        </form>
    </div>
    <?php
    $_carts = \App\Models\Cart::where ( 'user_id' , auth ()->id () )->get ();
    ?>
    <div class="settleup_2014 right">
        <i class="gw-left"></i>
        <i class="gw-right"></i>
        <div class="cw_icon sc">
            <i class="gw-count cw_icon">{{ $_carts->count()}}</i>
            <i class="sd"></i>
        </div>
        <a href="{{route ('home.cart.index')}}" style="font-size: 15px">我的购物车</a>
        @auth()
            <div class="dorpdown-layer">
                @foreach($_carts  as $value)
                    <li class="meiyou">
                        <div class="gouwc_tup">
                            <a href="#"><img src="{{$value['pic']}}"></a>
                        </div>
                        <div class="gouwc_biaot">
                            <a href="#" style="font-size: 10px">{{$value['title']}}</a>
                        </div>
                        <div class="gouwc_shanc">
                            <span style="font-size: 10px">￥{{$value['price']}}</span>
                            <a href="#" style="font-size: 10px" >删除</a>
                        </div>
                        @endforeach
                    </li>
            </div>
        @else
            <div class="dorpdown-layer">
                <ul>
                    <li class="meiyou">
                        <img src="{{asset ('org/home')}}/images/settleup-nogoods.png">
                        <span>购物车中还没有商品，<a href="{{route ('home.login')}}" style="color: red;font-size: 10px">请登录</a>赶紧选购吧！</span>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
    <div class="hotwords">
        <a class="biaoti">热门搜索：</a>
        @foreach($_keywords as $keyword)
        <a href="{{route('home.search',['kwd'=>$keyword['kwd']])}}">{{$keyword['kwd']}}</a>
        @endforeach
    </div>
</div>

@yield('content')
<!--底部-->
<div class="dib_beij">
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
@stack('js')
</body>
</html>

