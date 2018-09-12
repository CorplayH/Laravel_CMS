@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-header-title">
                站点配置管理
                {{--<p class="mt-3">站点配置标识：site</p>--}}
            </h4>
        </div>
        <div class="card-body">

            <form action="{{route ('admin.config.store',['name'=>$name])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">网站标题</label>
                    <input type="text" name="title" value="{{$data['value']['title']}}" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">网站关键词</label>
                    <input type="text" name="keyword" value="{{$data['value']['keyword']}}" class="form-control"  >
                </div>
                <div class="form-group">
                    <label for="">网站年份</label>
                    <input type="text" name="year" value="{{$data['value']['year']}}" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">网站描述</label>
                    <textarea name="description" class="form-control"  rows="3">{{$data['value']['description']}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">icp</label>
                    <input type="text" name="icp" class="form-control" value="{{$data['value']['icp']}}" >
                </div>
                <button type="submit" class="btn btn-primary">保存数据</button>
            </form>

        </div>

    </div>
@endsection
