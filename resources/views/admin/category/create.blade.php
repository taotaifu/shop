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
                            <li class="box-label"><a href="javascript:void(0)">所有栏目 <span>123</span></a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0)">Work <span>103</span></a></li>
                            <li><a href="javascript:void(0)">Family <span>19</span></a></li>
                            <li><a href="javascript:void(0)">Friends <span>623</span></a></li>
                            <li><a href="javascript:void(0)">Private <span>53</span></a></li>
                            <li class="box-label"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">+ 添加新的商品栏目</a></li>
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
                                <h4 class="card-title">商品栏目管理</h4>
                            </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route ('admin.category.index')}}">
                                        <span class="hidden-sm-up"><i class="ti-home"></i></span>
                                        <span class="hidden-xs-down">商品栏目列表</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route ('admin.category.create')}}">
                                        <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">添加商品栏目</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <form action="{{route ('admin.category.store')}}" method="post" class="form-horizontal ">
                                        <!--/row-->
                                        @csrf
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">栏目名称</label>
                                            <div class="col-md-9">
                                                <input type="text" name="name" placeholder="请输入栏目名称" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">父级栏目</label>
                                            <div class="col-md-9">
                                                <select name="pid" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="0">顶级栏目</option>
                                                    @foreach($categories as $v)
                                                        <option value="{{$v['id']}}">{{$v['_name']}}</option>
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

                        <!-- .left-aside-column-->
                    </div>
                    <!-- /.left-right-aside-column-->
                </div>
            </div>
        </div>
    </div>

@endsection

