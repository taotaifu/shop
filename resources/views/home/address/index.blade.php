@extends('home.layouts.menu')
@section('content')
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





