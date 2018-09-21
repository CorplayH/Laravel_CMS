@extends('layout.member.master')
@section('menu')
    @include('layout.member.show_menu')
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            【{{$user->name}}】的粉丝
        </div>
        <div class="card-body">
            <div class="row">
                @if(count ($fans) != 0)
                    @foreach($fans as $fan)
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    {{$fan['name']}}
                                </div>
                                <div class="card-body text-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{$fan['icon']}}" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                @auth()
                                    @can('isSub',$fan)
                                        <div class="card-footer">
                                            @if(auth ()->user ()->isfollowing($fan))
                                                <a href="{{route ('member.toggleFollow',$fan)}}" class="btn btn-danger btn-block">取消关注</a>
                                            @else
                                                <a href="{{route ('member.toggleFollow',$fan)}}" class="btn btn-white btn-block"><span class="fe fe-plus "></span>关注</a>
                                            @endif
                                        </div>
                                    @endcan
                                @endauth
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class=" container text-muted text-center">
                        暂无粉丝...
                    </div>
                @endif
            </div>
        </div>
        @if(count ($fans) != 0)
            <div class="card-footer text-muted">
                {{$fans->links()}}
            </div>
        @endif
    </div>
@endsection
@push('js')

@endpush
@push('css')

@endpush
