<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="{{route('index')}}">
            <img src="{{asset('org/Dashkit/dist/assets')}}/img/logo.svg" class="navbar-brand-img
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
                    <a class="nav-link active" href="{{route('admin.index')}}">
                        <i class="fe fe-home"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarPages" data-toggle="collapse" role="button" aria-expanded="false"
                       aria-controls="sidebarPages">
                        <i class="fe fe-file"></i> 网站配置
                    </a>
                    <div class="collapse " id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route ('admin.config.edit',['name'=>'site'])}}" class="nav-link" role="button" aria-expanded="false"
                                   aria-controls="sidebarProfile">
                                    基本配置
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route ('admin.config.edit',['name'=>'aliyun'])}}" class="nav-link" role="button" aria-expanded="false"
                                   aria-controls="sidebarProject">
                                    阿里云配置
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route ('admin.config.edit',['name'=>'base'])}}" class="nav-link" >
                                    站点配置
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route ('admin.config.edit',['name'=>'email'])}}" class="nav-link" >
                                    邮件配置
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route ('admin.config.edit',['name'=>'upload'])}}" class="nav-link" >
                                    上传配置
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#sidebarLayouts" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="fe fe-layout"></i> 后台管理
                    </a>
                    <div class="collapse " id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route ('admin.category.index')}}" class="nav-link">
                                    栏目管理
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>


            <!-- User (md) -->
            <div class="navbar-user mt-auto d-none d-md-flex">

                <!-- Icon -->
                <a href="#sidebarModalActivity" class="text-muted" data-toggle="modal">

                </a>

                <!-- Dropup -->
                <div class="dropup">

                    <!-- Toggle -->
                    <a href="#!" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="{{asset('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-1.jpg"
                                 class="avatar-img rounded-circle" alt="...">
                        </div>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                        <a href="{{route('member.index')}}" class="dropdown-item">{{auth()->user()->name}}</a>
                        <a href="{{route('article.index')}}" class="dropdown-item">博客</a>
                        <a href="{{route('index')}}" class="dropdown-item">{{cms_config('site.title')}}</a>
                        <hr class="dropdown-divider">
                        <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                    </div>

                </div>

                <!-- Icon -->
                <a href="#sidebarModalSearch" class="text-muted" data-toggle="modal">

                </a>

            </div>


        </div> <!-- / .navbar-collapse -->

    </div> <!-- / .container-fluid -->
</nav>
