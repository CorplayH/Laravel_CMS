{{--会员中心通知左侧列表栏--}}
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="{{route('index')}}">
            <img src="{{asset ('org/Dashkit/dist/assets')}}/img/logo.svg" class="navbar-brand-img
          mx-auto" alt="...">
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">
            <!-- Dropdown -->
            <div class="dropdown">
                <!-- Toggle -->
                <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="{{auth()->user()->icon}}" class="avatar-img rounded-circle"
                             alt="...">
                    </div>
                </a>
                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="{{route('member.index')}}" class="dropdown-item">{{auth()->user()->name}}</a>
                    <a href="{{route('admin.index')}}" class="dropdown-item">个人空间</a>
                    <a href="{{route('admin.index')}}" class="dropdown-item">后台管理</a>
                    <hr class="dropdown-divider">
                    <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="{{route ('member.notify.index')}}">
                        <i class="fe fe-home"></i> {{auth()->user()->name}} 的通知中心
                    </a>
                </li>

            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false"
                       aria-controls="sidebarComponents">
                        <i class="fe fe-book-open"></i> Components
                    </a>
                    <div class="collapse show" id="sidebarComponents">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route ('member.notify.index')}}" class="nav-link active">文章评论通知</a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div> <!-- / .navbar-collapse -->

    </div> <!-- / .container-fluid -->
</nav>
