{{--//表单验证错误处理--}}
<script src="https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js"></script>
@if ($errors->any())
    <script>
        swal({
            text: "@foreach ($errors->all() as $error ) {{$error}}\r\n @endforeach",
            icon: "warning",
            button: false
        });
    </script>
@endif

{{--//dump(session()->all());--}}
{{--/成功提示--}}
@if(session()->has('success'))
    <script>
        swal({
            text: "{{session()->get('success')}}",
            icon: "success",
            button: false
        });
    </script>
@endif

{{--//  失败提示--}}
@if(session()->has('danger'))
    <script>
        swal({
            text: "{{session()->get('danger')}}",
            icon: "warning",
            button: false
        });
    </script>
@endif



{{--layer 弹出层--}}
{{--http://layer.layui.com/--}}
{{--成功提示--}}
<script src="{{asset('org/layer/layer.js')}}"></script>
@if (session()->has('layer_success'))
    <script>
        layer.msg("{{session()->get('layer_success')}}", {icon: 6});
    </script>
@endif
{{--成功提示--}}
@if (session()->has('layer_danger'))
    <script>
        layer.msg("{{session()->get('layer_danger')}}", function(){
//关闭后的操作
        });
    </script>
@endif
