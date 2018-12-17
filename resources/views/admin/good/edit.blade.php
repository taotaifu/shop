@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- .left-right-aside-column-->
                <div class="contact-page-aside">
                    <!-- .left-aside-column-->
                    <div class="left-aside">
                        <ul class="list-style-none">
                            <li class="box-label"><a href="javascript:void(0)">所有商品 <span>123</span></a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0)">Work <span>103</span></a></li>
                            <li><a href="javascript:void(0)">Family <span>19</span></a></li>
                            <li><a href="javascript:void(0)">Friends <span>623</span></a></li>
                            <li><a href="javascript:void(0)">Private <span>53</span></a></li>
                            <li class="box-label"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">+ 添加新的商品列表</a></li>
                            <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Add Lable</h4></div>
                                        <div class="modal-body">
                                            <from class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-12">Name of Label</label>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" placeholder="type name"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Select Number of people</label>
                                                    <div class="col-md-12">
                                                        <select class="form-control">
                                                            <option>All Contacts</option>
                                                            <option>10</option>
                                                            <option>20</option>
                                                            <option>30</option>
                                                            <option>40</option>
                                                            <option>Custome</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </from>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button>
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </ul>
                    </div>
                    <!-- /.left-aside-column-->
                    <div class="right-aside">
                        <div class="card">
                            <div class="card-body p-b-0">
                                <h4 class="card-title">商品管理</h4>
                            </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('admin.good.index')}}">
                                        <span class="hidden-sm-up"><i class="ti-home"></i></span>
                                        <span class="hidden-xs-down">商品列表</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('admin.good.create')}}">
                                        <span class="hidden-sm-up"><i class="ti-user"></i></span> <span
                                            class="hidden-xs-down">添加商品</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <form action="{{route('admin.good.update',$good)}}" method="post" class="form-horizontal ">
                                        @csrf @method('PUT')
                                        <div class="row">
                                            <div class="col-7">
                                                <!--/row-->
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">商品名称</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="title" value="{{$good['title']}}" placeholder="请输入商品名称" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">商品价格</label>
                                                    <div class="col-md-9">
                                                        <input type="number" name="price" value="{{$good['price']}}" placeholder="请输入商品价格" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">所属分类</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control custom-select" name="category_id" data-placeholder="Choose a good"
                                                                tabindex="1">
                                                            <option value="">请选择分类</option>
                                                            @foreach($categories as $category)
                                                                <option @if($category['id']== $good['category_id']) selected @endif value="{{$category['id']}}">{!! $category['_name'] !!}</option>
                                                            @endforeach
                                                        </select>
                                                        <small class="form-control-feedback"> 请选择父级商品</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">商品列表图片</label>
                                                    <div class="col-md-9">
                                                        <div class="layui-upload-drag" id="test10">
                                                            @if(old ('list_pic'))
                                                                <img width="80" src="{{old ('list_pic')}}" alt="">
                                                                <input type="hidden" name="list_pic" value="{{old ('list_pic')}}">
                                                            @else
                                                                <img src="{{$good['list_pic']}}" alt="" width="50">
                                                                <input type="hidden" name="list_pic" value="{{$good['list_pic']}}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">商品图册</label>
                                                    <div class="col-md-9">
                                                        <div class="layui-upload">
                                                            <button type="button" class="layui-btn" id="test2">多图片上传</button>
                                                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                                                <div class="layui-upload-list" id="demo2">
                                                                    @if(old ('pics'))
                                                                        @foreach(old ('pics') as $value )
                                                                            <li>
                                                                                <span onclick="delImage(this)" class="mdi mdi-close"></span>
                                                                                <img width="80" src="{{$value}}" alt="">
                                                                                <input type="hidden" name="pics[]" value="{{$value}}">
                                                                            </li>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach($good['pics'] as $value )
                                                                            <li>
                                                                                <span onclick="delImage(this)" class="mdi mdi-close"></span>
                                                                                <img width="80" src="{{$value}}" alt="">
                                                                                <input type="hidden" name="pics[]" value="{{$value}}">
                                                                            </li>
                                                                        @endforeach
                                                                     @endif
                                                                </div>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">商品描述</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" name="description" value="{{$good['description']}}"></input>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">商品详情</label>
                                                    <div class="col-md-9">
                                                        <input id="demo" style="display: none;" name="content" value="{{$good['content']}}"></input>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5" id="app">
                                                <div class="card" v-for="(v,k) in specs">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-3">规格</br>名称</label>
                                                            <div class="col-md-9">
                                                                <input type="text" v-model="v.spec" placeholder="14寸 64G 内存" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-3">库存</label>
                                                            <div class="col-md-9">
                                                                <input type="text" v-model="v.total" placeholder="100" class="form-control">
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-danger btn-sm pull-right" @click="del(k)" type="button">删除</button>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <button type="button" @click="add" class="btn btn-success">添加规格</button>
                                                </div>
                                                <textarea name="specs" hidden id="" cols="30" rows="10">@{{specs}}</textarea>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-success">保存数据</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- .left-aside-column-->
                    </div>
                    <!-- /.left-right-aside-column-->
                </div>
            </div>

        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('org/layui/css/layui.css')}}">
@endpush

@push('js')
    <script src="{{asset('org/layui/layui.js')}}"></script>
    <script>
        layui.use(['upload', 'layedit'], function () {
            var $ = layui.jquery
                , upload = layui.upload;
            var layedit = layui.layedit;
            // 编辑器
            layedit.build('demo', {
                hegiht: 200
                , uploadImage: {
                    url: "{{route('util.upload')}}",
                    type: 'post'
                }
            });

            // 拖图上传
            upload.render({
                elem: '#test10'
                , url: "{{route('util.upload')}}"
                , data: {}
                , headers: {}
                , accept: 'images'
                , acceptMime: 'image/jpg, image/png'
                , size: 20000000
                , exts: 'jpg|png|gif'
                , drag: true //是否接受拖拽的文件上传，设置 false
                , done: function (res) {
                    // console.log(res)
                    if (res.code == 0) {
                        $('#test10').html('<img src="' + res.data.src + '" alt="" width="50"><input type="hidden" name="list_pic" value="' + res.data.src + '">')
                    } else {
                        swal({
                            text: res.message,
                            icon: "warning",
                            button: false
                        });
                    }
                }
            });
            //多图上传
            upload.render({
                elem: '#test2'
                , url: "{{route('util.upload')}}"
                , data: {}
                , headers: {}
                , accept: 'images'
                , acceptMime: 'image/jpg, image/png'
                , size: 20000000
                , exts: 'jpg|png|gif'
                , done: function (res) {
                    // console.log(res)
                    //上传完毕
                    if (res.code == 0) {
                        $('#demo2').append('<li><span onclick="delImage(this)" class="mdi mdi-close"></span><img src="' + res.data.src + '" alt="" width="50" height="50" class="layui-upload-img"><input type="hidden" name="pics[]" value="' + res.data.src + '"></li>')
                    } else {
                        swal({
                            text: res.message,
                            icon: "warning",
                            button: false
                        });
                    }
                }
            });
        })
    </script>
    <script src="https://cdn.bootcss.com/vue/2.5.18-beta.0/vue.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                specs: {!! $spec !!}
            },
            methods: {
                add() {
                    this.specs.push({spec: '', total: ''})
                },
                del(k) {
                    this.specs.splice(k, 1)
                }
            }


        })


    </script>
    <script>
        function delImage(obj) {
            $(obj).parents('li').remove();
        }
    </script>
@endpush

