@extends('layout.admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route ('role.permission.index')}}" class="nav-link active">
                        权限列表
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            @foreach($modules as $module)
                <div class="card">
                    <div class="card-header">
                        {{$module['title']}}&nbsp;|
                        <span class="text-secondary small">&nbsp;{{$module['name']}}</span>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($module['permission'] as $permission)
                                <div class="col-3">
                                    <strong>{{$permission['title']}}</strong>
                                    <span class="text-secondary small">| {{$permission['name']}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
