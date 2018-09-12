@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-header-title">
                邮件配置
            </h4>

        </div>
        <div class="card-body">

            <form action="{{route ('admin.config.store',['name'=>$name])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">驱动</label>
                    <input type="text" name="MAIL_DRIVER" value="{{$data['value']['MAIL_DRIVER']}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">主机</label>
                    <input type="text" name="MAIL_HOST" value="{{$data['value']['MAIL_HOST']}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">端口</label>
                    <input type="text" name="MAIL_PORT" value="{{$data['value']['MAIL_PORT']}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">用户名</label>
                    <input type="text" name="MAIL_USERNAME" value="{{$data['value']['MAIL_USERNAME']}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">密码</label>
                    <input type="password" name="MAIL_PASSWORD" value="{{$data['value']['MAIL_PASSWORD']}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">加密方式</label>
                    <input type="text" name="MAIL_ENCRYPTION" value="{{$data['value']['MAIL_ENCRYPTION']??'tls'}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">发送地址</label>
                    <input type="text" name="MAIL_FROM_ADDRESS" value="{{$data['value']['MAIL_FROM_ADDRESS']}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">发送者</label>
                    <input type="text" name="MAIL_FROM_NAME" value="{{$data['value']['MAIL_FROM_NAME']}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <button type="submit" class="btn btn-primary">保存数据</button>
            </form>

        </div>

    </div>
@endsection
