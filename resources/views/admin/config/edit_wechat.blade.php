@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-header-title">
                微信配置项管理
            </h4>

        </div>
        <div class="card-body">

            <form action="{{route ('admin.config.store',['name'=>$name])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">token</label>
                    <input type="text" name="token" value="{{$data['value']['token']??''}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">appid</label>
                    <input type="text" name="appid" value="{{$data['value']['appid']??''}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">appsecret</label>
                    <input type="text" name="appsecret" value="{{$data['value']['appsecret']??''}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">缓存目录</label>
                    <input type="text" name="cache_path" value="{{$data['value']['cache_path']??'storage/houdunren/wechat'}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <button type="submit" class="btn btn-primary">保存数据</button>
            </form>

        </div>

    </div>
@endsection
