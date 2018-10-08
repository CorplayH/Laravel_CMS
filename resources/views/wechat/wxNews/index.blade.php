@extends('layout.admin.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route('wechat.news.index')}}" class="nav-link active">
                        图文回复列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('wechat.news.create')}}" class="nav-link">
                        添加图文回复
                    </a>
                </li>
            </ul>
            <table class="table table-nowrap">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">图文回复名称</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v['id']}}</td>
                        <td>{{$v->rule->name}}</td>
                        <td>{{$v['created_at']}}</td>
                        <td>
                            <a href="{{route('wechat.news.edit',$v)}}" class="btn btn-primary btn-sm">编辑</a>
                            <a href="javascript:;" onclick="del(this)" class="btn btn-danger btn-sm">删除</a>
                            <form action="{{route('wechat.news.destroy',$v)}}" method="post">
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
