@extends('home.layouts.menu')
@section('content')
    <div class="mod_main">
        <div class="mt">
            <div class="shand_piaot">订单详情</div>
            <div class="extra-r"><a href="{{route ('home.personal_center.index')}}">查看全部订单</a></div>
        </div>
        <div class="tb_order">
            @foreach($settlement as $v)
                <table width="100%">
                    <tbody class="fore0">
                    @foreach($v->orderDetail as $c)
                    <tr>
                        <td style="width: 180px">
                            <div class="img-list">
                                <div>{{$c['title']}}</div>
                                <a href="#" target="_blank"><img src="{{$c['pic']}}"></a>
                            </div>

                        </td>
                        <td>
                            <div class="u-name">用户名：</div>
                            <div class="u-name">{{auth ()->user ()->name}}</div>
                        </td>

                        <td>总价：￥{{$c['price']}}<br>在线支付</td>

                        <td>
                            <div>交易时间：</div>
                            <span class="ftx-03">{{$c['created_at']}}<br></span>
                        </td>
                        <td class="order-doi">
                            <div>订单状态：</div>
                            @if($v['status'] ==1)
                                <div class="yiwanc_hui">未支付</div>
                            @elseif($v['status'] ==2)
                                <div class="yiwanc_hui">已支付</div>
                            @elseif($v['status'] ==3)
                                待发货
                            @elseif($v['status'] ==4)
                                已发货
                            @elseif($v['status'] ==5)
                                交易已完成
                            @endif
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
    <div class="mod_main mod_main1 mod_main2">
        <div class="mt">
            <h3>我收藏的商品</h3>
            <div class="extra-r"><a href="#">查看更多</a></div>
        </div>
        <div class="follow">
            <ul>
                <li>
                    <a class="follow_tup_kuang" href="#"><img src="{{asset('org/home')}}/images/xiangqtu_1.jpg"></a>
                    <p><a href="#">MI手机 小米Note3 全网通版 6GB+128GB 亮蓝 移动联通电信4G手机 双卡双待<span>(已有100+人评价)</span></a></p>
                    <p class="p_color_1">￥52.00</p>
                    <p></p>
                </li>
                <li>
                    <a class="follow_tup_kuang" href="#"><img src="{{asset('org/home')}}/images/yic_003.jpg"></a>
                    <p><a href="#">MI手机 小米Note3 全网通版 6GB+128GB 亮蓝 移动联通电信4G手机 双卡双待<span>(已有100+人评价)</span></a></p>
                    <p class="p_color_1">￥52.00</p>
                    <p></p>
                </li>
                <li>
                    <a class="follow_tup_kuang" href="#"><img src="{{asset('org/home')}}/images/shangq_1.jpg"></a>
                    <p><a href="#">MI手机 小米Note3 全网通版 6GB+128GB 亮蓝 移动联通电信4G手机 双卡双待<span>(已有100+人评价)</span></a></p>
                    <p class="p_color_1">￥52.00</p>
                    <p></p>
                </li>
                <li>
                    <a class="follow_tup_kuang" href="#"><img src="{{asset('org/home')}}/images/shangq_3.jpg"></a>
                    <p><a href="#">MI手机 小米Note3 全网通版 6GB+128GB 亮蓝 移动联通电信4G手机 双卡双待<span>(已有100+人评价)</span></a></p>
                    <p class="p_color_1">￥52.00</p>
                    <p></p>
                </li>
                <li>
                    <a class="follow_tup_kuang" href="#"><img src="{{asset('org/home')}}/images/rem_shangp.jpg"></a>
                    <p><a href="#">MI手机 小米Note3 全网通版 6GB+128GB 亮蓝 移动联通电信4G手机 双卡双待<span>(已有100+人评价)</span></a></p>
                    <p class="p_color_1">￥52.00</p>
                    <p></p>
                </li>
            </ul>
        </div>
    </div>
@endsection
