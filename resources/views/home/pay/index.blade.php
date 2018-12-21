<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <title>WangID通城——加入购物车</title>

    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/ziy.css">
    <script type="text/javascript" src="{{asset ('org/home')}}/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="{{asset ('org/home')}}/js/jquery.SuperSlide.2.1.1.source.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

<!--头部-->
<div id="header">
    <div class="header-box">
        <h3 class="huany">WangID本地购物商城欢迎您的到来！</h3>
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
            <li class="denglu">Hi~<a class="red" href="dengl.html">请登录!</a> <a href="zhuc.html">[免费注册]</a></li>
            <li class="shu"></li>
            <li class="denglu"><a class="ing_ps" href="#">我的收藏</a></li>
            <li class="shu"></li>
        </ul>
    </div>
</div>
<!--搜索栏-->
<div class="toub_beij">
    <div class="logo"><a href="./"><img src="{{asset ('org/home')}}/images/logo.png"></a></div>
    <div class="search">
        <input type="text" value="家电一折抢" class="text" id="textt">
        <button class="button">搜索</button>
    </div>
    <div class="right">
        <i class="gw-left"></i>
        <i class="gw-right"></i>
        <div class="sc">
            <i class="gw-count">0</i>
            <i class="sd"></i>
        </div>
        <a href="gouw_che.html">我的购物车</a>
        <div class="dorpdown-layer">
            <ul>
                <li class="meiyou">
                    <img src="{{asset('org/home')}}/images/settleup-nogoods.png">
                    <span>购物车中还没有商品，赶紧选购吧！</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="hotwords">
        <a class="biaoti">热门搜索：</a>
        <a href="#">新款连衣裙</a>
        <a href="#">四件套</a>
        <a href="#">潮流T恤</a>
        <a href="#">时尚女鞋</a>
        <a href="#">乐1</a>
        <a href="#">特步女鞋</a>
        <a href="#">威士忌</a>
    </div>
</div>


<!--轮播图上方导航栏  一栏-->
<div id="navv" class="navv_ziy">
    <div class="focus">
        <div class="focus-a">
            <div class="fouc-font fouc_font_ziy">
                <a href="#">全部商品分类</a>
            </div>
        </div>
        <div class="focus-b">
            <ul>
                <li><a href="#">商城首页</a></li>
                <li><a href="#">本地生活</a></li>
                <li><a href="#">团购专区</a></li>
                <li><a href="#">积分商城 </a></li>
                <li><a href="#">分销系统</a></li>
                <li><a href="#">办公耗材</a></li>
                <li><a href="#">饰品礼品</a></li>
                <li><a href="#">休闲娱乐</a></li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    (function () {
        var $subblock = $(".subpage"), $head = $subblock.find('h2'), $ul = $("#proinfo"), $lis = $ul.find("li"), inter = false;
        $head.mouseover(function (e) {
            e.stopPropagation();
            if (!inter) {
                $ul.show();
            } else {
                $ul.hide();
            }
            inter = !inter;
        });

        $ul.mouseover(function (event) {
            event.stopPropagation();
        });

        $(document).mouseover(function () {
            $ul.hide();
            inter = !inter;
        });
    })();
</script>
<!--加入购物车-->
<div class="beij_center">
    <div class="jiar_gouw_c_beij">
        <div class="msg"><i class="c_i_img"></i>恭喜您的商品已购买成功！</div>
        <div class="shangp_jr">
            <div class="jr_zuo">
                <div class="jr_biaot">
                    <p>订单号:{{$settlements['number']}}</p>
                    <p class="spandf">
                        <span>总价:¥ {{$settlements['total_price']}}</span>
                        <br>
                        <span>总数量: {{$settlements['total_num']}}件</span>
                    </p>
                </div>
            </div>
            <div class="jr_you">
                <a href="{{route ('home.cart.index')}}" class="jr_fanh">返回</a>
                <a href="{{route ('home.cart.index')}}" class="jr_qv_gouw_che">继续购物<em class="jr_jiant"></em></a>
            </div>
        </div>
    </div>
    <div class="" style="display: block;text-align:center">
        {{--<img src="{{asset ('org/images')}}/ewm.png" alt="">--}}
        <img src="{{asset('org/php_sdk_v3.0.9/example')}}/qrcode.php?data=<?php echo urlencode($url2);?>" width="200" alt="">
    </div>
</div>

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
                    <li><a href="zhangh_anq.html">账户安全</a></li>
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

</body>
</html>
<script src="{{asset ('org/layer/layer.js')}}"></script>
<script src="https://cdn.bootcss.com/vue/2.5.21/vue.min.js"></script>
<script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.min.js"></script>

<script>
    $(function () {
        var number = "{{$settlements['number']}}";
        var id = "{{$settlements['id']}}";
        setInterval(function () {
            $.post("{{route('home.check_order_status')}}",{number:number},function (res) {
                if(res.code == 1){
                    location.href = '{{route('home.personal_center.index')}}';
                }else {
                    {{--location.href = '{{route('home.settlement.index')}}';--}}
                }
            },'json')
        },1000)
    })
</script>
