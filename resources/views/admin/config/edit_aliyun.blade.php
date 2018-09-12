@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-header-title">
                阿里云配置
            </h4>

        </div>
        <div class="card-body">

            <form action="{{route ('admin.config.store',['name'=>$name])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">regionId</label>
                    <input type="text" name="ALIYUN_REGIONID" value="{{$data['value']['ALIYUN_REGIONID']??'cn-hangzhou'}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">accessId</label>
                    <input type="text" name="ALIYUN_ACCESSID" value="{{$data['value']['ALIYUN_ACCESSID']??''}}" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">accessKey</label>
                    <input type="text" name="ALIYUN_ACCESSKEY" value="{{$data['value']['ALIYUN_ACCESSKEY']??''}}" class="form-control" id="exampleInputPassword1" >
                </div>

                <button type="submit" class="btn btn-primary">保存数据</button>
            </form>

        </div>

    </div>
@endsection
