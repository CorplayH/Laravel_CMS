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
        <form action="{{route('role.savePermission',$role)}}" method="post">
            @csrf
            <div class="card-body">
                @foreach($modules as $k => $module)
                    <div class="card">
                        <div class="card-header">
                            {{$module['title']}}&nbsp;|
                            <span class="text-secondary small">&nbsp;{{$module['name']}}</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($module['permission'] as $pk => $permission)
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$module['name'].'-'.$permission['name']}}" name="permission[]" id="permission{{$k}}{{$pk}}" @if($role->hasPermissionTo($module['name'].'-'.$permission['name'])) checked @endif>
                                            <label class="form-check-label" for="permission{{$k}}{{$pk}}">{{$permission['title']}}</label>
                                            <span class="text-secondary small">| {{$permission['name']}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </form>
    </div>
@endsection
