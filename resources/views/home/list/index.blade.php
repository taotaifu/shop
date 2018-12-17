@extends('home.layouts.master')
@section('content')

    <!--轮播图上方导航栏  一栏-->
    <div id="navv" class="navv_ziy">
        <div class="focus">
            <div class="focus-a">
                <a href="#">全部商品分类</a>
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
    {{--<!--列表一开了-->--}}
    <div class="nSearchWarp">
        <div class="hot-tj">
            <span class="icon_tj">热卖<br>推荐</span>
            <ul class="hot-list clearfix">
                @foreach($goods as $good)
                    <li class="item asynPriceBox">
                        <p class="pic">
                            <a target="_blank" href="{{route ('home.content',['content'=>$good['id']])}}"><img src="{{$good['list_pic']}}" alt=""></a>
                        </p>
                        <p class="name"><a href="#" title=""> {{$good['title']}}</a></p>
                        <p class="price asynPrice">¥{{$good['price']}}</p>
                        <p class="btn"><a class="buy" href="#">立即抢购</a></p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    <!--!!!-->
    <div class="lujing_ziy">
        @foreach($fartherData as $v)
            <a href="{{route ('home.list',['list'=>$v['id']])}}">{{$v['name']}}</a>
            >
        @endforeach
    </div>
    <div class="shangp_lieb_jvz">
        <div class="selector">
            <div class="s-title">
                <h3><b>笔记本</b><em>商品筛选</em></h3>
                <div class="st-ext">共&nbsp;<span>63337</span>个商品</div>
            </div>
            <div class="J_selectorLine s-line J_selectorFold">
                <div class="sl-wrap multiple_D">
                    <div class="sl-key">
                        <span>处理器：</span>
                    </div>
                    <div class="sl-value">
                        <div class="sl-v-list">
                            <ul class="J_valueList">
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">Intel CoreM</a>
                                </li>
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">Intel i3</a>
                                </li>
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">Intel i5低功耗版</a>
                                </li>
                            </ul>
                        </div>
                        <div class="st_d">
                            <a href="#">确定</a>
                            <a href="#">取消</a>
                        </div>
                    </div>
                    <div class="sl-ext">
                        <a class="sl-e-more" style="visibility: visible;"> </a>
                        <a class="sl-e-multiple"> 多选<i></i></a>
                    </div>
                </div>
                <div class="sl-wrap">
                    <div class="sl-key">
                        <span>价格：</span>
                    </div>
                    <div class="sl-value">
                        <div class="sl-v-list">
                            <ul class="J_valueList">
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">10-100</a>
                                </li>
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">100-500</a>
                                </li>
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">500以上</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sl-ext">
                        <a class="sl-e-more" style="visibility: visible;">更多<i></i></a>
                        <a class="sl-e-multiple">多选<i></i></a>
                    </div>
                </div>
                <div class="sl-wrap">
                    <div class="sl-key">
                        <span>款式：</span>
                    </div>
                    <div class="sl-value">
                        <div class="sl-v-list">
                            <ul class="J_valueList">
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">软壳</a>
                                </li>
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">定制</a>
                                </li>
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">硬壳</a>
                                </li>
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">边框</a>
                                </li>
                                <li>
                                    <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">运动臂包</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sl-ext">
                        <a class="sl-e-more" style="visibility: visible;">更多<i></i></a>
                        <a class="sl-e-multiple">多选<i></i></a>
                    </div>
                </div>
                <div id="yingc">
                    <div class="sl-wrap">
                        <div class="sl-key">
                            <span>风格：</span>
                        </div>
                        <div class="sl-value">
                            <div class="sl-v-list">
                                <ul class="J_valueList">
                                    <li>
                                        <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">简约</a>
                                    </li>
                                    <li>
                                        <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">卡通动漫</a>
                                    </li>
                                    <li>
                                        <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">商务</a>
                                    </li>
                                    <li>
                                        <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">奢华</a>
                                    </li>
                                    <li>
                                        <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">小清新</a>
                                    </li>
                                    <li>
                                        <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">怀旧</a>
                                    </li>
                                    <li>
                                        <a href="#" rel='nofollow'><input type="checkbox" class="checkbox yingc_df">轻奢主义</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sl-ext">
                            <a class="sl-e-more" style="visibility: visible;">更多<i></i></a>
                            <a class="sl-e-multiple">多选<i></i></a>
                        </div>
                    </div>
                </div>
                <div class="s_more">
                    <span class="sm-wrap" onclick="xians()" data-more="材质、风格、选购热点 等">更多选项（ 材质、风格、选购热点 等）<i></i></span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function xians() {
                var ddd = document.getElementById('yingc');
                if (ddd.style.display == 'block') {
                    ddd.style.display = 'none';
                }
                else {
                    ddd.style.display = 'block';
                }
            }
        </script>
        <!--列表-->
        <div class="shangp_lieb_yi">
            <div class="filter_yi">
                <div class="f_line">
                    <div class="f_sort">
                        <a href="{{route ('home.list',['list'=>$list])}}" class="curr_1"><label>综合排序</label> <i></i></a>
                        @if(request ()->query('total') == 'asc')
                            <a href="{{route ('home.list',['list'=>$list,'total'=>'desc'])}}" class="curr_2">销量<i></i></a>
                        @else
                            <a href="{{route ('home.list',['list'=>$list,'total'=>'asc'])}}" class="curr_2">销量<i></i></a>
                        @endif
                        @if(request ()->query('price') == 'asc')
                            <a href="{{route ('home.list',['list'=>$list,'price'=>'desc'])}}" class="curr_2">价格<i></i></a>
                        @else
                            <a href="{{route ('home.list',['list'=>$list,'price'=>'asc'])}}" class="curr_2">价格<i></i></a>
                        @endif
                        <a href="{{route ('home.list',['list'=>$list])}}" class="curr_2">评论数<i></i></a>
                        @if(request ()->query('created_at') == 'asc')
                            <a href="{{route ('home.list',['list'=>$list,'created_at'=>'desc'])}}" class="curr_2">上架时间<i></i></a>
                        @else
                            <a href="{{route ('home.list',['list'=>$list,'created_at'=>'asc'])}}" class="curr_2">上架时间<i></i></a>
                        @endif
                    </div>
                    <div class="f_pager" id="J_topPage">
           			<span class="fp_text">
               			<b>1</b><em>/</em><i>166</i>
          			</span>
                        <a class="fp_prev disabled" href="#"> &lt; </a>
                        <a class="fp_next" href="#"> &gt; </a>
                    </div>
                    <div class="lieb_anniu_kuang">
                        <a class="lieb_ann" href="shangp_lieb.html"></a>
                        <a class="lieb_ann lieb_er_abn" href="shangp_lieb_1.html"></a>
                    </div>
                </div>
                <div class="f_line_xia">
                    <div class="sdgdfg">配&nbsp;送&nbsp;至：</div>
                    <div class="docs-methods">
                        <form class="form-inline">
                            <div id="distpicker">
                                <div class="form-group">
                                    <div style="position: relative;">
                                        <input id="city-picker3" class="form-control" readonly type="text" value="北京市/北京市/朝阳区" data-toggle="city-picker">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="f_feature">
                        <ul>
                            <li id="delivery"><a class="selected" href="#"><i></i>仅显示有货</a></li>
                            <li id="delivery_211"><a class="" href="#"><i></i>货到付款</a></li>
                            <li id="delivery_daofu"><a class="" href="#"><i></i>真划算</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="shnagp_list_v1">
                <ul>
                    @foreach($goods as $good)
                        <li>
                            <div class="lieb_neir_kuang">
                                <div class="lieb_img">
                                    <a href="#"><img width="300" src="{{$good['list_pic']}}"></a>
                                    <div class="p_focus"><a class="J_focus" href="#"><i></i>关注</a></div>
                                </div>
                                <div class="lieb_text">
                                    <div class="p_price">
                                        <strong class="J_price"><em>¥</em><i>{{$good['price']}}</i><em class="shangp_yuanj zuo_ji">¥</em><i class="shangp_yuanj">{{$good['price']}}</i></strong>
                                    </div>
                                </div>
                                <div class="shangp_biaot_"><a href="#">{{$good['title']}}</a></div>
                                <div class="lieb_dianp_mingc">
                                    <div class="zuo_mingc">
                                        <p><a class="lianpu_minc" href="#">{{$good['title']}}专营店</a><a class="mis" href="#">点我交谈</a></p>
                                        <div class="p_icons">
                                            <i class="icon_grou_1" data-tips="本地商品"><img src="{{asset('org/home')}}/images/bend.png"></i>
                                            <i class="icon_grou_2" data-tips="商品特价出售">特价</i>
                                        </div>
                                    </div>
                                    <div class="you_pingj">
                                        <p>已有评价</p>
                                        <span><a href="#"><em>100+</em></a> 人</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="jiaz_zhong"><a href="#">玩命加载中</a></div>
                <div class="page clearfix">
                    <div class="p-wrap" id="J_bottomPage">
		            <span class="p-num">
						<a class="pn-prev disabled" href="undefined&amp;ms=5"><i>&lt;</i><em>上一页</em></a>
						<a href="#" class="curr_3">1</a>
		                <b class="pn-break hide"> …</b>
		                <a href="/#" class="hide ">-2</a>
		                <a href="/#" class="hide ">-1</a>
		                <a href="#" class="hide ">0</a>
		                <a href="#" class="hide curr_3">1</a>
		                <a href="#" class=" ">2</a>
		                <a href="#" class=" ">3</a>
		                <b class="pn-break "> …</b>
		                <a href="#" class="">166</a>
						<a class="pn-next" href="#">下一页<i>&gt;</i></a>
					</span>
                        <span class="p-skip">
		                <em>共<b>166</b>页&nbsp;&nbsp;到第</em>
		                <input class="input-txt" value="1">
		                <em>页</em>
		                <a class="btn btn-default" href="javascript:page_jump();">确定</a>
		            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--列表一结束-->
    <!--猜你喜欢-->
    <div class="cain_xih">
        <div class="mt">
            <h2 class="title">猜你喜欢</h2>
            <div class="extra">
                <a href="#" class="change"><i class="ico"></i><span class="txt">换一批</span></a>
            </div>
        </div>
        <ul class="cain_xihuan_neir">
            @foreach($latestGood as $v)
                <li>
                    <div class="item_pic"><a href="#"><img src="{{$v['list_pic']}}"></a></div>
                    <div class="cain_xih_biaot"><a href="#">{{$v['title']}}</a></div>
                    <div class="cain_xih_jiaq"><p>￥{{$v['price']}}</p></div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

