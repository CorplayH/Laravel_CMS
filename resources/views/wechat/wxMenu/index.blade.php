@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route ('wechat.wxMenu.index')}}" class="nav-link active">
                        菜单列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route ('wechat.wxMenu.create')}}" class="nav-link">
                        菜单添加
                    </a>
                </li>
            </ul>
            <table class="table table-nowrap">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">菜单名称</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{$menu['id']}}</td>
                        <td>{{$menu['name']}}</td>
                        <td>
                            <a href="{{route ('wechat.wxMenu.push',$menu)}}" class="btn btn-success btn-sm">推送</a>
                            <a class="btn btn-primary btn-sm" href="{{route ('wechat.wxMenu.edit',$menu)}}">编辑</a>
                            <a class="btn btn-danger btn-sm" href="javascript:;" onclick="del(this)">删除</a>
                            <form action="{{route ('wechat.wxMenu.destroy',$menu)}}" hidden method="post">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
