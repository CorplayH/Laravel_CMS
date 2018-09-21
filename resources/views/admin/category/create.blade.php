@extends('layout.admin.master')
@section('content')
<div class="card">
    <form class="mt-3" action="{{route ('admin.category.store')}}" method="post">
        @csrf
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route ('admin.category.index')}}" class="nav-link ">
                        栏目列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route ('admin.category.create')}}" class="nav-link active">
                        栏目添加
                    </a>
                </li>
            </ul>
            <div class="form-group">
                <label for="">栏目名称</label>
                <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">图标</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i id="icon" class="fa fa-meetup"></i>
                        </span>
                    </div>
                    <input readonly type="text" name="icon" class="form-control">
                    <div class="input-group-append">
                        <a href="javascript:;" onclick="chooseIcon()" class="input-group-text">选择图标</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer text-muted">
            <button class="btn btn-primary">保存数据</button>
        </div>
    </form>
</div>
@endsection
@push('js')
<script>
    function chooseIcon() {
        require(['hdjs'], function (hdjs) {
            hdjs.font(function (icon) {
                $('input[name=icon]').val(icon);
                $('#icon').attr('class', icon);
                $('#hdMessage').modal('hide');
            })
        })
    }
</script>
@endpush
