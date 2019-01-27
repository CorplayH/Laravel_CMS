@extends('layout.admin.master')
@section('content')
    <div class="card">
        <form class="mt-3" action="" method="post">
            @csrf
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route ('admin.userIndex')}}" class="nav-link ">
                            管理员列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route ('admin.userCreate')}}" class="nav-link active">
                            添加管理员账号
                        </a>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="form-group mt-3">
                        <label for="">账号</label>
                        <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">密码</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary">保存数据</button>
            </div>
        </form>
    </div>
@endsection

