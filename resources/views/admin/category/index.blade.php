@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route ('admin.category.index')}}" class="nav-link active">
                        栏目列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route ('admin.category.create')}}" class="nav-link">
                        栏目添加
                    </a>
                </li>
            </ul>
            <table class="table table-nowrap">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">栏目名称</th>
                    <th scope="col">图标</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category['id']}}</th>
                        <td>{{$category['title']}}</td>
                        <td>
                            <i class="{{$category['icon']}}"></i>{{$category['icon']}}
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route ('admin.category.edit',$category)}}">编辑</a>
                            <a class="btn btn-danger btn-sm" href="javascript:;" onclick="del(this)">删除</a>
                            <form action="{{route ('admin.category.destroy',$category)}}" hidden method="post">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            {{$categories->links()}}
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
