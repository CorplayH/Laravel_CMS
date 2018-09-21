
<div class="dropdown">
@auth()
    <!-- Toggle -->
        <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{auth ()->user ()->icon}}" alt="..." class="avatar-img rounded-circle">
        </a>
        <!-- Menu -->
        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{route ('member.user.edit',[auth ()->user (),'type'=>'icon'])}}" class="dropdown-item">{{auth()->user ()->name}}</a>
            <a href="{{route ('member.user.show',auth ()->user ())}}" class="dropdown-item">个人空间</a>
            {{--User::where('email',$email)->first()--}}
            @can('view',auth ()->user ())
                <a href="{{route ('admin.index')}}" class="dropdown-item">后台管理</a>
            @endcan
            <hr class="dropdown-divider">
            <a href="{{route ('logout')}}" class="dropdown-item">退出</a>
        </div>
    @else
        <a href="{{route ('login')}}" class="btn btn-white btn-sm">
            <span class="fe fe-home mr-1"></span>登录
        </a>
        <a href="{{route ('user.create')}}" class="btn btn-white btn-sm">
            注册
        </a>
    @endauth
</div>
