@extends('home.layouts.master')
@section('content')
    <!--轮播图-->
    <!--轮播图上方导航栏  一栏-->
    <div id="navv">
        <div class="focus">
            <div class="focus-a">
                <div class="fouc-font"><a href="">全部商品分类</a></div>
            </div>
            <div class="focus-b">
                <ul>
                    <?php $i = 0; ?>
                    @foreach($categoryData as $v)
                        <?php $i++;?>
                        @if($i<6)
                            <li>
                                <a href="{{route ('home.list',['list'=>$v['id']])}}" style="font-size: 15px">{{$v['name']}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!--左边导航-->
            <div class="dd-inner">
                <?php $i = 0; ?>
                @foreach($categoryData as $v)
                    <?php $i++;?>
                    @if($i<8)
                        <div class="font-item">
                            <div class="item fore1">
                                <h3>
                                    <a style="font-size: 15px" class="da_zhu" href="{{route ('home.list',['list'=>$v['id']])}}">{{$v['name']}}</a>
                                    <p>
                                        <?php $i = 0; ?>
                                        @foreach($v['_data'] as $vv)
                                            <?php $i++;?>
                                            @if($i<4)
                                                <a style="font-size: 10px" href="{{route ('home.list',['list'=>$v['id']])}}">{{$vv['name']}}</a>
                                            @endif
                                        @endforeach
                                    </p>
                                </h3>
                            </div>
                            <div class="font-item1">
                                <div class="font-lefty">
                                    @foreach($v['_data'] as $vv)
                                        <dl class="fore1">
                                            <dt>
                                                <a href="{{route ('home.list',['list'=>$v['id']])}}">{{$vv['name']}}<i>></i></a>
                                            </dt>
                                            <dd>
                                                @foreach($vv['_data'] as $vv)
                                                    <a href="{{route ('home.list',['list'=>$v['id']])}}">{{$vv['name']}}</a>
                                                @endforeach
                                            </dd>
                                        </dl>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <!---->
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!--轮播图-->
    <div id="lunbo">
        <ul id="one">
            {{--@foreach($figures as $figure)--}}
            <li><a href=""><img src="{{asset ('org/images')}}/banner.jpg"></a></li>
            <li><a href=""><img src="{{asset ('org/images')}}/banner1.jpg"></a></li>
            <li><a href=""><img src="{{asset ('org/images')}}/banner.jpg"></a></li>
            <li><a href=""><img src="{{asset ('org/images')}}/banner1.jpg"></a></li>
            {{--@endforeach--}}
        </ul>
        <ul id="two">
            <li class="on">1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
        </ul>
        <!--轮播图左右箭头-->
        <div class="slider-page">
            <a href="javascript:void(0)" id="left"><</a>
            <a href="javascript:void(0)" id="right">></a>
        </div>
    </div>



    <!--内容一开始了-->
    <!--快速通道栏-->

    <div class="kuanjlan">
        <div class="slideTxtBox">
            <div class="hd">
                <h1>
                    <p>最新商品展示</p>
                </h1>
            </div>
            <ul class="clearfix" style="margin-top: 15px">
                <?php $i = 0; ?>
                @foreach($latestGood as $v)
                    <?php $i++;?>
                    @if($i<5)
                        <li>
                            <div class="list-li-box">
                                <a class="list-img" href="{{route ('home.content',['content'=>$v['id']])}}" data-code="index01004-2" target="_blank">
                                    <img width="240" src="{{$v['list_pic']}}">
                                </a>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <!--层次-->
    {{--办公家具--}}
    <div class="chengc_jvz">
        @foreach(\App\Models\Category::where('pid',0)->get() as $v)
            <div class="slideTxtBox">
                <div class="hd">
                    <h1>
                        <p>{{$v['name']}}</p>
                    </h1>
                    <ul>
                        @foreach(\App\Models\Category::where('pid',$v['id'])->get() as $vv)
                            <li>{{$vv['name']}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="bd">
                    @foreach(\App\Models\Category::where('pid',$v['id'])->get() as $vv)
                        <ul>
                            @foreach($vv->good as $good)
                                <div class="you_lirb" style="width: 1200px">
                                    <div class="shang_buf " style="width: 1290px">
                                        <div class="you_shangp_lieb">
                                            <a href="{{route ('home.content',['content'=>$good['id']])}}"><img class="you_tup_k" src="{{$good['list_pic']}}"></a>
                                            <a href="{{route ('home.content',['content'=>$good['id']])}}" class="_you_neir_biaot">{{$good['title']}}</a>
                                            <span>¥{{$good['price']}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    {{--办公家具结束--}}
    <script type="text/javascript">jQuery(".slideTxtBox").slide();</script>
    <script type="text/javascript">jQuery(".slideTxtBox2").slide();</script>
    <script type="text/javascript">jQuery(".slideTxtBox3").slide();</script>
    <script type="text/javascript">jQuery(".slideTxtBox4").slide();</script>



    <!--广告图-->
    <div class="guangg_tu">
        <a href="#"><img src="{{asset ('org/home')}}/images/guang_tu.jpg"></a>
    </div>


    <!--特色商品/ 热门商品-->

    <div class="tes_shnagp_beij">
        <div class="tes_shangp">
            <div class="neir_biaot">
                <p>特色商品</p>
                <p class="yingw">featured</p>
                <a href="#">MORE+</a>
            </div>
            <div class="tes_shangp_neir_k">
                <div class="tes_dat">
                    <?php $i = 0; ?>
                    @foreach($latestGood as $v)
                        <?php $i++;?>
                        @if($i<2)
                            <a href="{{route ('home.content',['content'=>$v['id']])}}">
                                <h1><img style="height: 250px" class="tes_dat_dongh" src="{{$v['list_pic']}}"></h1>
                                <h2>{{$v['title']}}</h2>
                                <span>¥ {{$v['price']}}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="tes_xiaot_beij">
                    <div class="tes_xiaot_shang">
                        <?php $i = 0; ?>
                        @foreach($latestGood as $v)
                            <?php $i++;?>
                            @if($i<3)
                                <div class="tes_xiaot_neir">
                                    <a href="{{route ('home.content',['content'=>$v['id']])}}">
                                        <img style="width: 250px" class="tes_xiaot_dongh" src="{{$v['list_pic']}}">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tes_xiaot_shang tes_xiaot_xia">
                        <?php $i = 0; ?>
                        @foreach($latestGood as $v)
                            <?php $i++;?>
                            @if($i<3)
                        <div class="tes_xiaot_neir">
                            <a href="{{route ('home.content',['content'=>$v['id']])}}">
                                <img class="tes_xiaot_dongh" src="{{$v['list_pic']}}">
                            </a>
                        </div>
                                @endif
                            @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="rem_shangp">
            <div class="neir_biaot">
                <p>热门商品</p>
                <p class="yingw">Hot commodity</p>
                <a href="#">MORE+</a>
            </div>
            <div class="rem_shangp_beij_k">
                <!---->
                <div class="picScroll_left">
                    <div class="hd">
                        <ul></ul>
                    </div>
                    @foreach($latestGood as $v)
                        <div class="bd">
                            <ul class="picList">
                                <li>
                                    <div class="pic">
                                        <a href="#" target="_blank">
                                            <img src="{{$v['list_pic']}}">
                                        </a>
                                    </div>
                                    <div class="title">
                                        <a href="#" target="_blank">{{$v['title']}}</a>
                                        <span>¥ {{$v['price']}}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
                <!---->
            </div>
        </div>
    </div>
    <!--特色商品/ 热门商品结束-->
    <script type="text/javascript">
        jQuery(".picScroll_left").slide({titCell: ".hd ul", mainCell: ".bd ul", autoPage: true, effect: "left", autoPlay: true, vis: 2, trigger: "click"});
    </script>

@endsection


