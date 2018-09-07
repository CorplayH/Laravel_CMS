<script>
    //操作成功提示消息
    // 判断session中是否有success
    @if(session ()->has ('success'))
    require(['hdjs'], function (hdjs) {
        hdjs.swal({
            //提示框消息文本内容
            text: "{{session ()->get ('success')}}",
            button:false,//是否有按钮
            icon:'success'//提示框图标
        });
    })
    @endif
</script>

<script>
    //操作失败提示消息
    @if(session ()->has ('error'))
    require(['hdjs'], function (hdjs) {
        hdjs.swal({
            text: "{{session ()->get ('error')}}",
            button:false,
            icon:'error'
        });
    })
    @endif
</script>

<script>
    //自动验证提示消息
    //手册：表单验证->显示验证错误信息
    @if ($errors->any())
    require(['hdjs'], function (hdjs) {
        hdjs.swal({
            text: "@foreach ($errors->all() as $error) {{ $error }} @endforeach",
            button:false,
            icon:'warning'
        });
    })
    @endif
</script>


