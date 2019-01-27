@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route ('admin.assignRole',$admin)}}" class="nav-link active">
                        角色列表
                    </a>
                </li>
            </ul>
        </div>
        <form action="{{route('admin.storeRole',$admin)}}" method="post">
            @csrf
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach($roles as $k => $role)
                            <div class="col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$role['name']}}"
                                               name="roles[]" id="role{{$k}}"
                                               @if($admin->hasRole($role['name'])) checked @endif>
                                        <label class="form-check-label" for="role{{$k}}">{{$role['title']}}</label>
                                        <span class="text-secondary small">| {{$role['name']}}</span>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </form>
    </div>
@endsection
