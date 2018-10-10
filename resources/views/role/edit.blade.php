@extends('layout.admin.master')
@section('content')
    <div class="card">
        <form class="mt-3" action="{{route ('role.role.update',$role)}}" method="post">
            @csrf @method('PUT')
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route ('role.role.index')}}" class="nav-link ">
                            角色列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route ('role.role.create')}}" class="nav-link active">
                            添加角色
                        </a>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="form-group mt-3">
                        <label for="">角色名称(中文标识)</label>
                        <input type="text" name="title" value="{{$role->title}}" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">角色名称(英文标识)</label>
                        <input type="text" name="name" value="{{$role->name}}" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary">保存数据</button>
            </div>
        </form>
    </div>
@endsection

