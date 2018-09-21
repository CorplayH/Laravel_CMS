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
                @if(count ($followers) != 0)
                    @foreach($followers as $follower)
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    {{$follower['name']}}
                                </div>
                                <div class="card-body text-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{$follower['icon']}}" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                @auth()
                                    @can('isSub',$follower)
                                        <div class="card-footer">
                                            @if(auth ()->user ()->isfollowing($follower))
                                                <a href="{{route ('member.toggleFollow',$follower)}}" class="btn btn-danger btn-block">取消关注</a>
                                            @else
                                                <a href="{{route ('member.toggleFollow',$follower)}}" class="btn btn-white btn-block"><span class="fe fe-plus "></span>关注</a>
                                            @endif
                                        </div>
                                    @endcan
                                @endauth
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class=" container text-muted text-center">
                        暂无关注的人...
                    </div>
                @endif
            </div>
        </div>
        @if(count ($followers) != 0)
            <div class="card-footer text-muted">
                {{$followers->links()}}
            </div>
        @endif
    </div>
@endsection
@push('js')

@endpush
@push('css')

@endpush
