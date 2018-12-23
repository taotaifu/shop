@extends('home.layouts.menu')
@section('content')
    <div class="mod_main">
        <div class="jib_xinx_kuang">

                <div class="wt">
                    <ul>
                        <li class="dangq_hongx"><a href="{{route ('home.material_center.index')}}">个人信息</a></li>
                        <li><a href="{{route ('home.material_center.create')}}">设置头像</a></li>
                    </ul>
                </div>
                <div class="wd">
                    <div class="user_set">
                        <form action="{{route('home.user.update',auth()->user())}}" method="post">
                            @csrf @method('PUT')
                        <div class="item_meic">
                            <span class="label_meic" ><em>*</em> 昵称：</span>
                            <div class="fl_e">
                                <input type="text" placeholder="请输入用户昵称" name="name" value="{{auth()->user()->name}}" class="itxt_succ itxt_succ_url" maxlength="20" id="nickName" >
                            </div>
                        </div>
                        <div class="item_meic">
                            <span class="label_meic">性别：</span>
                            <div class="fl_e">
                                <input type="radio" name="sex" class="jdradio" value="男" checked="">
                                <label class="mr10">男</label>
                                <input type="radio" name="sex" class="jdradio" value="女">
                                <label class="mr10">女</label>
                            </div>
                        </div>
                            <div class="layui-form-item item_meic">
                                <div class="layui-inline label_meic">
                                <span class="layui-form-label label_meic">年龄：</span>
                                    <div name="year" class="layui-input-inline area">
                                        <input type="text" name="birthday" value="{{auth()->user()->birthday}}" id="date" placeholder="2019年-1月-1日" class="layui-input">
                                    </div>
                                </div>
                            </div>
                            <div class="item_meic">
                            <span class="label_meic">邮箱：</span>
                            <div class="fl_e">
                                <input type="text" hidden name="email" value="{{auth()->user()->email}}">
                                <strong>{{auth ()->user()->email}}</strong>
                                <a href="#" class="ftx05 ml10">修改</a>
                                <span class="ftx03">已验证</span>
                            </div>
                        </div>
                        <div class="item_meic">
                            <span class="label_meic"><em>*</em> 姓名：</span>
                            <div class="fl_e">
                                <input type="text" name="name"  placeholder="请输入真实姓名" class="user_address">
                                <p class="youh_tis ftx03">输入真实姓名，不得超过20个英文或10个汉字</p>
                            </div>
                        </div>
                        <div class="item_meic">
                            <span class="label_meic"> </span>
                            <div class="fl_e">
                                <input type="submit" value="保存" class="savebtn">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset ('org/home')}}/css/account.css"/>
@endpush
@push('js')
    {{--三级城市联动--}}
    <script src="https://cdn.bootcss.com/distpicker/2.0.5/distpicker.min.js"></script>
    <script src="{{asset ('org/home')}}/js/list.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('org/layui/layui.js')}}"></script>
    <script>
        //城市联动
        $("#distpicker").distpicker({
            province: "{{auth()->user()->province?:''}}",
            city: '{{auth()->user()->city?:''}}',
            district: '{{auth()->user()->district?:''}}'
        });
        layui.use(['form', 'layedit', 'laydate'], function () {
            var form = layui.form
                , layer = layui.layer
                , laydate = layui.laydate;
            //日期
            laydate.render({
                elem: '#date'
            });
            form.on('select(a)', function (data) {
                console.log(data)
                $("#a").val(data.value).change();
                form.render();
            })

            form.on('select(b)', function (data) {
                $("#b").val(data.value).change();
                form.render();
            })

            form.on('select(c)', function (data) {
                $("#c").val(data.value).change();
                form.render();
            })
        });

    </script>
@endpush
