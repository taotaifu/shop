@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-b-0">
                    <h4 class="card-title">栏目管理</h4>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('admin.category.index')}}">
                            <span class="hidden-sm-up"><i class="ti-home"></i></span>
                            <span class="hidden-xs-down">栏目列表</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.category.create')}}">
                            <span class="hidden-sm-up"><i class="ti-user"></i></span> <span
                                class="hidden-xs-down">添加栏目</span>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="{{route('admin.category.update',$category)}}" method="post"
                              class="form-horizontal ">
                        @csrf  @method('PUT')
                        <!--/row-->
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">栏目名称</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" value="{{$category['name']}}" placeholder="请输入栏目名称" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">父级栏目</label>
                                <div class="col-md-9">
                                    <select name="pid" class="form-control custom-select" data-placeholder="Choose a Category"
                                            tabindex="1">
                                        <option value="0">顶级栏目</option>
                                        @foreach($categories as $v)
                                            <option @if($category['pid']==$v['id']) selected @endif value="{{$v['id']}}">{!! $v['_name'] !!}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-control-feedback"> 请选择父级栏目</small>
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
        </div>
    </div>
@endsection
