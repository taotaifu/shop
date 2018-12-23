@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid" id="app">
        <!-- 头部开始 -->
        <div class="header mt-md-2">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h2 class="header-title">
                            轮播图管理
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('shower.figure.index')}}" class="nav-link ">
                                    展示列表
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('shower.figure.create')}}" class="nav-link active">
                                    添加列表
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{--头部结束--}}
        {{--中间内容开始--}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="container-fluid">
                            <!-- Header -->
                            <div class="row card ">
                                <div class="col-12">
                                    <form method="post" action="{{route('shower.figure.store')}}">
                                        @csrf
                                        <div class="card-body" id="">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">轮播图名称</label>
                                                <input type="text" name="name" class="form-control" value="{{old ('name')}}" id="exampleInputEmail1" placeholder="">
                                            </div>
                                            <label for="exampleInputEmail1">图片上传</label>
                                            <div class="input-group mb-1" style="height: 25px">
                                                <input class="form-control" name='icon'>
                                                <div class="input-group-append">
                                                    <button  hidden type="button" id="user_icon">
                                                        <i class="layui-icon">上传图片</i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div style="display: inline-block;position: relative;width:260px">
                                                <img src="{{asset('org/images/don2.jpg')}}" class="img-responsive img-thumbnail avatar-img" width="150">
                                                <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                                                    onclick="removeImg(this)">×</em>
                                            </div>
                                            <button type="submit" class="btn btn-primary">保存</button>
                                            <textarea name="data" hidden id="" cols="30" rows="10">@{{ menus }}</textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--中间内容结束--}}
        {{--@{{ currentMenu }}--}}
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
