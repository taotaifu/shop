@extends('home.layouts.menu')
@section('content')
            <!--右边内容-->
            <div class="mod_main">
                <div class="jib_xinx_kuang">
                    <div class="shand_piaot">编辑收货地址</div>
                    <div id="myModal">
                        <form method="post" action="{{route('home.address.update',$address)}}">
                            @csrf @method('PUT')
                            <div class="shouj_diz_b">
                                <div class="biaod_1">
                                    <p><em>*</em>联系人：</p>
                                    <input type="text" name="name" value="{{$address['name']}}" class="text">
                                </div>
                                <div class="biaod_1">
                                    <p><em>*</em>收货地址：</p>
                                    <div class="xinz_diz_cs">
                                        <div class="docs-methods">
                                            <form class="form-inline">
                                                <div id="distpicker">
                                                    <div class="form-group">
                                                        <div style="position: relative;">
                                                            <input id="city-picker3" name="province" class="form-control" readonly type="text" value="{{$address['province']}}" data-toggle="city-picker">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="biaod_1">
                                    <p><em>*</em>详细地址：</p>
                                    <input type="text" name="detail" value="{{$address['detail']}}" class="text text1">
                                </div>
                                <div class="biaod_1 biaod_2">
                                    <div class="liangp_e">
                                        <p><em>*</em>手机号码：</p>
                                        <input type="text" name="phone" value="{{$address['phone']}}" class="text">
                                    </div>
                                </div>
                                <div class="biaod_1">
                                    <button type="submit" class="diz_baoc">保存</button>
                                </div>
                            </div>
                        </form>
                        <a class="close-reveal-modal">&#215;</a>
                    </div>
                </div>
            </div>
            <!--右边内容结束-->
        </div>
    </div>
</div>


<!--新增地址表单-->

<!--底部-->
@endsection
@include('layouts.message')



