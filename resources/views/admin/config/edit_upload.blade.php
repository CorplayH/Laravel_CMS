@extends('layout.admin.master')
@section('content')
    <form action="{{route ('admin.config.store',['name'=>$name])}}" method="post">

        <div class="card">
            <div class="card-header">
                <h4 class="card-header-title">
                    图片上传配置
                </h4>

            </div>
            <div class="card-body">

                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">上传到大小</label>
                    <div class="input-group mb-3">
                        <input type="text" name="image_size" value="{{$data['value']['image_size']??''}}" class="form-control" id="exampleInputEmail1">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">B</span>
                        </div>
                    </div>
                    <span class="help-block text-muted">设置图片上传大小</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">上传类型</label>
                    <input type="text" name="image_type" value="{{$data['value']['image_type']??''}}" class="form-control" id="exampleInputPassword1">
                </div>

            </div>

        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-header-title">
                    文件上传配置
                </h4>

            </div>
            <div class="card-body">

                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">上传到大小</label>
                    <div class="input-group mb-3">
                        <input type="text" name="file_size" value="{{$data['value']['file_size']??''}}" class="form-control" id="exampleInputEmail1">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">B</span>
                        </div>
                    </div>
                    <span class="help-block text-muted">设置图片上传大小</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">上传类型</label>
                    <input type="text" name="file_type" value="{{$data['value']['file_type']??''}}" class="form-control" id="exampleInputPassword1">
                    <span class="help-block text-muted">设置图片上传大小</span>
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-primary">保存数据</button>

    </form>
@endsection
