@extends('home.layouts.menu')
@section('content')
    <div class="mod_main">
        <div class="jib_xinx_kuang">
            <div class="wt">
                <ul>
                    <li><a href="{{route ('home.material_center.index')}}">个人信息</a></li>
                    <li><a href="{{route ('home.material_center.create')}}">设置头像</a></li>
                </ul>
            </div>
            <div class="wd">
                <div class="up_avater">
                    <div class="warp_tip">
                        <div class="upload_main">
                            <div class="up-left">
                                <div class="pic-show">
                                    <div class="pic-wrap ">
                                        <img id="user_icon" src="{{auth()->user()->icon}}">
                                    </div>
                                </div>
                            </div>
                            <div class="up-right">
                                <div class="up-right-title">
                                    <h5>效果预览</h5>
                                    <p>你上传的图片会自动生成3种尺寸，请注意小尺寸的图片是否清晰</p>
                                </div>
                                <div class="up-top">
                                    <div class="pic-100-box">
                                        <div class="pic-100 ">
                                            <img src="{{auth()->user()->icon}}">
                                        </div>
                                        <span class="pic-tip">100X100像素</span>
                                    </div>
                                </div>
                                <div class="uc_container">
                                    <div class="up-bottom uc-pic-img">
                                        <div class="pic-60-box">
                                            <div class="pic-60 ">
                                                <img src="{{auth()->user()->icon}}">
                                            </div>
                                            <span class="pic-tip">60X60像素</span>
                                        </div>
                                    </div>
                                    <div class="uc-min uc-pic-img">
                                        <div class="pic-30-box">
                                            <div class="pic-30 ">
                                                <img src="{{auth()->user()->icon}}">
                                            </div>
                                            <span class="pic-tip">30X30像素</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('home.user.update',auth()->user())}}" method="post" id="editCicon">
                        @csrf @method('PUT')
                        <input type="hidden" name="icon" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script src="{{asset('org/layui/layui.js')}}"></script>
    <script>
        layui.use(['upload', 'layedit'], function () {
            var $ = layui.jquery
                , upload = layui.upload;
            //拖拽上传
            // alert('1');
            upload.render({
                elem: '#user_icon'
                , url: "{{route('util.upload')}}"
                , accept: 'images' //指定允许上传时校验的文件类型，可选值有：images（图片）、file（所有文件）、video（视频）、audio（音频）
                , acceptMime: "{{hd_config ('upload.upload_accept_mime','image/jpg, image/png,image/jpeg')}}"
                , size: "{{hd_config ('upload.upload_size',20000000)}}" //最大允许上传的文件大小，单位 KB。不支持ie8/9
                , exts: "{{hd_config ('upload.upload_type','jpg|png|gif|bmp|jpeg')}}"
                //上传成功之后的回调
                , done: function (res) {
                    if (res.code == 0) {
                        //$('#user_icon').html('<img src="' + res.data.src + '" alt="" width="50"><input type="hidden" name="list_pic" value="' + res.data.src + '">')
                        $('#user_icon').attr('src', res.data.src);
                        $('input[name=icon]').val(res.data.src);
                        //触发表单提交
                        $('#editCicon').submit();
                    } else {
                        layer.msg(res.msg, {icon: 2}, function () {
                            // 关闭后的操作
                        });
                    }

                }
            });
        })
        ;
    </script>
@endpush

