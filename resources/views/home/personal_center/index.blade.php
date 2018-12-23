@extends('home.layouts.menu')
@section('content')
    <div class="mod_main">
        <div class="jib_xinx_kuang">
            <div class="shand_piaot">我的订单</div>
            <div class="tab_trigger tab_trigger_wod_dd">
                <p class="attrK">实物订单：</p>
                <ul>
                    <li><a class="text_shaid" href="#">全部</a></li>
                    <li><a class="text_shaid" href="#">代付款</a>
                        <p class="sup">1</p></li>
                    <li><a class="text_shaid" href="#">待收货</a>
                        <p class="sup">1</p></li>
                    <li><a class="text_shaid" href="pingj_shaid.html">待评价</a>
                        <p class="sup">3</p></li>
                </ul>
            </div>
            <div class="tab_trigger tab_trigger_wod_dd">
                <p class="attrK">本地生活订单：</p>
                <ul>
                    <li><a class="text_shaid" href="#">门店</a></li>
                    <li><a class="text_shaid" href="#">教育</a></li>
                    <li><a class="text_shaid" href="#">旅游</a></li>
                    <li><a class="text_shaid" href="#">美食</a></li>
                    <li><a class="text_shaid" href="#">美容美发</a></li>
                </ul>
            </div>
            <div class="wod_dingd_shuaix">
                <div class="combox">
                    <div><span class="c-lable" val="1">近三个月的订单</span><i></i></div>
                    <ul class="c-list-value">
                        <li class=""><a href="#" val="1">近三个月的订单</a></li>
                        <li class=""><a href="#" val="2017">今年内订单</a></li>
                        <li class=""><a href="#" val="2016">2016年订单</a></li>
                        <li class=""><a href="#" val="2015">2015年订单</a></li>
                        <li class=""><a href="#" val="3">2015年以前订单</a></li>
                    </ul>
                </div>
                <p class="dingd_huis_zhan"><a href="#">订单回收站</a></p>
                <div class="search_box">
                    <input type="text" value="订单编号" class="seach_inpt">
                    <input type="button" value="" class="search-btn">
                </div>
            </div>
            <!--************************************-->
            <table class="order-tb order-tb_1">
                <colgroup>
                    <col class="number-col">
                    <col class="consignee-col">
                    <col class="amount-col">
                    <col class="operate-col">
                    <col class="dis_col">
                </colgroup>
                <thead>
                <tr>
                    <th>订单详情</th>
                    <th>金额</th>
                    <th>
                        <div class="combox combox_2">
                            <div><span class="c-lable" val="1">订单状态</span><i></i></div>
                            <ul class="c-list-value">
                                <li class=""><a href="#" val="2017">等待付款</a></li>
                                <li class=""><a href="#" val="2016">等待收货</a></li>
                                <li class=""><a href="#" val="2015">已完成</a></li>
                                <li class=""><a href="#" val="3">已取消</a></li>
                            </ul>
                        </div>
                    </th>
                    <th>收货人</th>
                    <th>操作</th>
                </tr>
                </thead>
                @foreach($settlements as $settlement)
                    <tbody>
                    <tr class="sep-row">
                        <td colspan="4"></td>
                    </tr>
                    <tr class="tr-th">

                        <td colspan="5">
                            <span class="gap"></span>
                            <span class="dealtime span_30" title="">{{$settlement->created_at->format('Y-m-d H:m:s')}}</span>
                            <span class="number span_30">订单号：<a href="#" target="_blank">{{$settlement['number']}}</a></span>
                            <span class="wod_sc_delete_beij span_30"><a href="" class="wod_dingd_delete"></a></span>
                        </td>

                    </tr>
                    <tr class="tr-bd">

                        <td rowspan="1">
                            @foreach($settlement->orderDetail as $v)
                                <div class="goods-item">
                                    <div class="p-img">
                                        <a target="_blank" href="#">
                                            <img src="{{$v['pic']}}" alt="">
                                        </a>
                                    </div>
                                    <div class="p-msg">
                                        <div class="p-name">
                                            <a target="_blank" href="#">{{$v['title']}} {{$v['spec']}}</a>
                                            <p class="yiwanc_hui"><a href="#">申请售后</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="goods-number">x{{$settlement['total_num']}}件</div>
                        </td>
                        <td rowspan="1">
                            <div class="zhif_jine">
                                <p>总额￥{{$settlement['total_price']}}</p>
                                <span>在线支付</span>
                            </div>
                        </td>
                        <td rowspan="1">
                            <div class="operate">
                                <div>订单状态：</div>
                                @if($settlement['status'] ==1)
                                    <p class="yiwanc_hui">未支付</p>
                                @elseif($settlement['status'] ==2)
                                    <p class="yiwanc_hui">已支付</p>
                                @elseif($settlement['status'] ==3)
                                    待发货
                                @elseif($settlement['status'] ==4)
                                    已发货
                                @elseif($settlement['status'] ==5)
                                    交易已完成
                                @endif
                                <a href="{{route ('home.personal_center.create')}}" target="_blank" class="a-link">订单详情</a><br>
                            </div>
                        </td>
                        <td rowspan="1">
                            <div class="txt_ren">
                                <span>{{auth ()->user ()->name}}</span>
                                <p class="ren_tub"></p>
                            </div>
                        </td>
                        <td rowspan="1">
                            <div class="operate">
                                <a href="#" target="_blank" class="a-link">评价</a>丨<a href="#" target="_blank" class="a-link">晒单</a><br>
                                {{--订单状态1未支付,2已支付,3待发货,4已发货,5交易已完成--}}
                                @if($settlement['status'] ==1)
                                 <a href="{{route('home.pay',['number'=>$settlement['number']])}}" target="_blank" title="去支付" class="btn-def">去支付</a>
                                @elseif($settlement['status'] ==2)
                                 <a href="javascript:;" target="_blank" title="已支付，未发货" class="btn-def">已支付,未发货</a>
                                @elseif($settlement['status'] ==3)
                                <a href="javascript:;" target="_blank" title="待发货" class="btn-def">待发货</a>
                                @elseif($settlement['status'] ==4)
                                <a href="javascript:;" target="_blank" title="确认收货" class="btn-def">确认收货</a>
                                @elseif($settlement['status'] ==5)
                                @endif
                            </div>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>

            <div class="gerzx_fany">
                <a href="#" class="shangxy">上一页</a>
                <a href="#">1</a>
                <a href="#" class="shangxy">上一页</a>
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
@endsection
