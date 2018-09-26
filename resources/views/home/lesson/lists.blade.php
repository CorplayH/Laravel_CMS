@extends('layout.admin.master')
@section('menu')
    <div class="card">
        <div class="card-header">
            <div>
                <span class="fe fe-user"></span> 内容管理
            </div>
        </div>
        <div class="card-body">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a href="{{route ('member.user.edit',[auth ()->user (),'type'=>'icon'])}}" class="nav-link active">课程管理</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('lesson.lists')}}" class="nav-link active">
                            课程列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('lesson.create')}}" class="nav-link">
                            课程添加
                        </a>
                    </li>
                </ul>
                <table class="table table-nowrap">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">课程名称</th>
                        <th scope="col">缩略图</th>
                        <th scope="col">视频数量</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lessons as $lesson)
                        <tr>
                            <th scope="row">{{$lesson->id}}</th>
                            <td>{{$lesson->title}}</td>
                            <td>
                                <img width="50" src="{{$lesson->thumb}}" alt="">
                            </td>
                            <td>
                                {{$lesson->video->count()}}
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route ('lesson.edit',$lesson)}}">编辑</a>
                                <a class="btn btn-danger btn-sm" href="javascript:;" onclick="del(this)">删除</a>
                                <form action="{{route ('lesson.destroy',$lesson)}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(obj) {
            require(['https://cdn.bootcss.com/sweetalert/2.1.0/sweetalert.min.js'],function (swal) {
                swal({
                    text: "确定删除吗?",
                    buttons: {
                        cancel: "取消",
                        defeat: '确定',
                    },
                }).then((value) => {
                    switch (value) {
                        case "defeat":
                            $(obj).next('form').trigger('submit');
                            break;
                    }
                });
            })
        }
    </script>
@endpush
@push('css')
    <style>
        .avatar{
            cursor: pointer;
        }
    </style>
@endpush
