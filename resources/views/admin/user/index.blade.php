@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route('admin.userIndex')}}" class="nav-link active">
                        管理员列表
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{route('admin.userCreate')}}" class="nav-link">
                        添加管理员账号
                    </a>
                </li>
            </ul>
            <table class="table table-nowrap">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">账号</th>
                    <th scope="col">创建日期</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->email ? :$admin->mobile}}</td>
                        <td>{{$admin->created_at}}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{route('admin.assignRole',$admin)}}">设置角色</a>
                            <a class="btn btn-primary btn-sm" href="">编辑</a>
                            <a class="btn btn-danger btn-sm" href="javascript:;" onclick="del(this)">删除</a>
                            <form action="" hidden method="post">
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
