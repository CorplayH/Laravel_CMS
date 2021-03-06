@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route ('role.role.index')}}" class="nav-link active">
                        角色列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route ('role.role.create')}}" class="nav-link">
                        添加角色
                    </a>
                </li>
            </ul>
            <table class="table table-nowrap">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">角色中文名称</th>
                    <th scope="col">角色英文名称</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->title}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{route('role.assignPermission',$role)}}">设置权限</a>
                            <a class="btn btn-primary btn-sm" href="{{route('role.role.edit',$role)}}">编辑</a>
                            <a class="btn btn-danger btn-sm" href="javascript:;" onclick="del(this)">删除</a>
                            <form action="{{route('role.role.destroy',$role)}}" hidden method="post">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(obj) {
            require(['https://cdn.bootcss.com/sweetalert/2.1.0/sweetalert.min.js'], function (swal) {
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
