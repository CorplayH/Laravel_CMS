@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route ('news.customMenu.index')}}" class="nav-link active">
                        分类列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route ('news.customMenu.create')}}" class="nav-link">
                        添加分类
                    </a>
                </li>
            </ul>
            <table class="table table-nowrap">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">分类名称</th>
                    <th scope="col">父级分类</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allCategories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->cname}}</td>
                        <td>{{$category->newCategory ? $category->newCategory->cname : '顶级分类'}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('news.customMenu.edit',$category)}}">编辑</a>
                            <a class="btn btn-danger btn-sm" href="javascript:;" onclick="del(this)">删除</a>
                            <form action="{{route('news.customMenu.destroy',$category)}}" hidden method="post">
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
