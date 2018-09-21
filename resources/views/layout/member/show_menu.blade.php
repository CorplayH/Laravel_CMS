<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white">
    <!-- Brand -->
    <a class="navbar-brand" href="{{route('index')}}">
        <img src="{{asset ('org/Dashkit/dist/assets')}}/img/logo.svg" class="navbar-brand-img
          mx-auto" alt="...">
    </a>
<div class="card">
    <div class="card-header">
        {{$user->name}}
    </div>
    <div class="card-body text-center">
        <div class="avatar avatar-xl">
            <img src="{{$user->icon}}" alt="..." class="avatar-img rounded-circle">
        </div>
    </div>
    @auth()
        @can('isSub',$user)
            <div class="card-footer">
                @if(auth ()->user ()->isfollowing($user))
                    <a href="{{route ('member.toggleFollow',$user)}}" class="btn btn-danger btn-block">取消关注</a>
                @else
                    <a href="{{route ('member.toggleFollow',$user)}}" class="btn btn-white btn-block"><span class="fe fe-plus "></span>关注</a>
                @endif
            </div>
        @endcan
    @endauth
</div>
    <div class="card">
        <div class="card-body">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a href="{{route ('member.user.getFans',$user)}}" class="nav-link text-muted {{active_class (if_route ('member.user.getFans'),'active','')}}"><i class="fa fa-plus mr-2"></i>他的粉丝</a>
                <a href="{{route ('member.user.getFollower',$user)}}" class="nav-link text-muted {{active_class (if_route ('member.user.getFollower'),'active','')}}"><i class=" fa fa-eye mr-2"></i>他的关注</a>
            </div>
        </div>
    </div>
</nav>

