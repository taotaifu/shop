@extends('admin.layouts.master')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">首页</a></li>
                <li class="breadcrumb-item active">订单管理</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-b-0">
                    <h4 class="card-title">订单管理</h4>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.settlement.index')}}">
                            <span class="hidden-sm-up"><i class="ti-home"></i></span>
                            <span class="hidden-xs-down">订单列表</span>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>订单号</th>
                                    <th>订单时间</th>
                                    <th>订单总价</th>
                                    <th>订单总数</th>
                                    <th>订单状态</th>
                                    <th>用户编号/昵称</th>
                                    <th>订单详情状况</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($settlements as $settlement)
                                    <tr>
                                        <td>{{$settlement['id']}}</td>
                                        <td>{{$settlement['number']}}</td>
                                        <td>{{$settlement['created_at']}}</td>
                                        <td>{{$settlement['total_price']}}</td>
                                        <td>{{$settlement['total_num']}}</td>
                                        <td>
                                            @if($settlement['status'] ==1)
                                                <span class="label label-warning">待用户支付</span>
                                            @elseif($settlement['status'] ==2)
                                                <span class="label label-info"> 已支付,等待发货 </span>
                                            @elseif($settlement['status'] ==3)
                                                <span class="label label-success">等待发货</span>
                                            @elseif($settlement['status'] ==4)
                                                <span class="label label-success">已发货,待用户确认</span>
                                            @elseif($settlement['status'] ==5)
                                                <span class="label label-success">用户确认收货,交易完成</span>
                                            @endif
                                        </td>
                                        <td>{{$settlement->user->id}}/{{$settlement->user->name}}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                <a class="btn btn-outline-secondary " href="{{route('admin.settlement.show',$settlement)}}" >订单详情</a>
                                                @if($settlement['status'] ==1)
                                                @elseif($settlement['status'] ==2)
                                                    <a class="btn btn-outline-info " href="{{route('admin.settlement.edit',$settlement)}}" >确认发货</a>
                                                @elseif($settlement['status'] ==3)
                                                @elseif($settlement['status'] ==4)
                                                @elseif($settlement['status'] ==5)
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            {{$settlements->links()}}
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(obj) {
            swal("确定删除吗?", {
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
@endpush
