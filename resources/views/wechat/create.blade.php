@extends('layout.admin.master')
@section('content')
    <form action="{{route ('wechat.baseResponse.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                微信基本回复管理
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">关注回复</label>
                    <input type="text" value="{{$field['welcome']??''}}" name="welcome" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">默认回复</label>
                    <input type="text" name="default" value="{{$field['default']??''}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary">保存数据</button>
            </div>
        </div>
    </form>

@endsection