@extends('home.layouts.master')
@section('content')
    <div>
        <div class="beij_center box_header">
            <a href="/">首页</a>
            >
            搜索：{{$kwd}}
        </div>
        <div class="beij_center dgsg" style="margin-top: 20px">
            @if(count ($goods) != 0)
                @foreach($goods as $good)
            <div class="box_body">
                <div class="item fl">
                    <div class="box_img"><a href="{{route ('home.content',['content'=>$good['id']])}}"><img src="{{$good['list_pic']}}"></a></div>
                    <div class="title" style="margin-top: 15px">
                        <a href="#">{{$good['title']}}</a>
                    </div>
                    <div class="price">¥{{$good['price']}}</div>
                    <div class="bottom">
                        <a href="javascript:;" class="btn"><i></i><span>加入购物车</span></a>
                    </div>
                </div>
            </div>
                @endforeach
                    {{$goods->appends(['price' => request ()->query('price'),'kwd'=>$kwd])->links('vendor.pagination.list_page')}}
                @else
                <p style="padding: 200px;text-align: center;color: #848484;">
                    <span class="layui-icon layui-icon-face-surprised"></span>
                    sorry,没有您要搜索的商品(⊙o⊙)哦
                </p>
             @endif
        </div>
    </div>
@endsection
