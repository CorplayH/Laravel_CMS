@extends('layout.member.master')
@section('content')
    <form action="{{route ('member.user.update',auth ()->user ())}}" method="post">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-header">
                个人资料
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">昵称</label>
                    <input type="text" name="name" value="{{auth ()->user()->name}}" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary">提交</button>
            </div>
        </div>
    </form>
@endsection
@push('js')

@endpush
@push('css')
    
@endpush