@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="header mt-md-2">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h2 class="header-title">
                            搜索配置
                        </h2>

                    </div>

                </div> <!-- / .row -->
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">


                <div class="card">
                    <div class="card-body">

                        <form method="post" action="http://laravel.taotaifu.cn/admin/config/update/search">
                            <input type="hidden" name="_token" value="44PtKN9R2AWOjrKbZTNsF8zIdPpaMc18IObAfHqt">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ALGOLIA_APP_ID</label>
                                <input type="text" name="ALGOLIA_APP_ID" value="" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ALGOLIA_SECRET</label>
                                <input type="text" name="ALGOLIA_SECRET" value="" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary">保存</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
