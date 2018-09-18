@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-header-title">
                基本配置
            </h4>

        </div>
        <div class="card-body">

            <form action="{{route ('admin.config.store',['name'=>$name])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">验证码</label>
                    <div class="input-group mb-3">
                        <input type="text" name="code_expire" value="{{$data['value']['code_expire']??''}}" class="form-control" id="exampleInputEmail1" >
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">秒</span>
                        </div>
                    </div>
                    <span class="help-block text-muted">设置注册验证码过期时间</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">回帖时间间隔</label>
                    <div class="input-group mb-3">
                        <input type="text" name="comment_expire" value="{{$data['value']['comment_expire']??''}}" class="form-control" id="exampleInputEmail1" >
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">秒</span>
                        </div>
                    </div>
                    <span class="help-block text-muted">设置回帖时间间隔</span>
                </div>

                <button type="submit" class="btn btn-primary">保存数据</button>
            </form>

        </div>

    </div>
@endsection
