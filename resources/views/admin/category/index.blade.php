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
                                            <h4 class="modal-title" id="myModalLabel">Add Lable</h4> </div>
                                        <div class="modal-body">
                                            <from class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-12">Name of Label</label>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" placeholder="type name"> </div>
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
                        <div class="right-page-header">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{route('admin.category.index')}}">
                                                <span class="hidden-sm-up"><i class="ti-home"></i></span>
                                                <span class="hidden-xs-down">商品栏目列表</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('admin.category.create')}}" >
                                                <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">添加商品栏目</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ml-auto">
                                    <input type="text" id="demo-input-search2" placeholder="搜索栏目" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add New Contact</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <from class="form-horizontal form-material">
                                                <div class="form-group">
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" placeholder="Type name"> </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" placeholder="Email"> </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" placeholder="Phone"> </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" placeholder="Designation"> </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" placeholder="Age"> </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" placeholder="Date of joining"> </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" placeholder="Salary"> </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light"><span><i class="ion-upload m-r-5"></i>Upload Contact Image</span>
                                                            <input type="file" class="upload"> </div>
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
                            </div><table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list footable-loaded footable" data-page-size="10">
                                <thead>
                                <tr>
                                    <th class="footable-sortable">No<span class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">栏目名称<span class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">操作<span class="footable-sort-indicator"></span></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $v)
                                <tr class="footable-even" style="">
                                    <td><span class="footable-toggle"></span>{{$v['id']}}</td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <td>{{$v['_name']}}</td>
                                    <td>
                                        <a href="{{route ('admin.category.edit',['id'=>$v['id']])}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="javascript:;" onclick="del(this)" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                        <form action="{{route ('admin.category.destroy',['id'=>$v['id']])}}" method="post">
                                            @csrf @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">添加商品栏目</button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- .left-aside-column-->
                    </div>
                    <!-- /.left-right-aside-column-->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(obj){
            swal("确定删除吗？",{
                buttons:{
                    cancel:"取消",
                    catch:{
                        text:"确定",
                        value:"catch",
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
@endpush
