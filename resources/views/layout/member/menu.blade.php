<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="index.html">
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
                        <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle"
                             alt="...">
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="profile-posts.html" class="dropdown-item">Profile</a>
                    <a href="settings.html" class="dropdown-item">Settings</a>
                    <hr class="dropdown-divider">
                    <a href="sign-in.html" class="dropdown-item">Logout</a>
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
                    <a class="nav-link " href="index.html">
                        <i class="fe fe-home"></i> {{cms_config ('site.title')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarPages" data-toggle="collapse" role="button" aria-expanded="false"
                       aria-controls="sidebarPages">
                        <i class="fe fe-file"></i> 个人资料
                    </a>
                    <div class="collapse " id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route ('member.user.edit',[auth ()->user (),'type'=>'icon'])}}" class="nav-link">
                                    用户头像
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route ('member.user.edit',[auth ()->user (),'type'=>'info'])}}" class="nav-link">
                                    个人信息
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route ('member.user.edit',[auth ()->user (),'type'=>'password'])}}" class="nav-link">
                                    修改密码
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarAuth" data-toggle="collapse" role="button" aria-expanded="false"
                       aria-controls="sidebarAuth">
                        <i class="fe fe-user"></i> Authentication
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false"
                                   aria-controls="sidebarSignIn">
                                    Sign in
                                </a>
                                <div class="collapse" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="sign-in-cover.html" class="nav-link">
                                                Cover
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="sign-in-illustration.html" class="nav-link">
                                                Illustration
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="sign-in.html" class="nav-link">
                                                Basic
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSignUp" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false"
                                   aria-controls="sidebarSignUp">
                                    Sign up
                                </a>
                                <div class="collapse" id="sidebarSignUp">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="sign-up-cover.html" class="nav-link">
                                                Cover
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="sign-up-illustration.html" class="nav-link">
                                                Illustration
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="sign-up.html" class="nav-link">
                                                Basic
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarPassword" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false"
                                   aria-controls="sidebarPassword">
                                    Password reset
                                </a>
                                <div class="collapse" id="sidebarPassword">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="password-reset-cover.html" class="nav-link">
                                                Cover
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="password-reset-illustration.html" class="nav-link">
                                                Illustration
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="password-reset.html" class="nav-link">
                                                Basic
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarError" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false"
                                   aria-controls="sidebarError">
                                    Error
                                </a>
                                <div class="collapse" id="sidebarError">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="error-illustration.html" class="nav-link">
                                                Illustration
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="error.html" class="nav-link">
                                                Basic
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#sidebarLayouts" data-toggle="collapse" role="button" aria-expanded="true"
                       aria-controls="sidebarLayouts">
                        <i class="fe fe-layout"></i> Layouts
                    </a>
                    <div class="collapse show" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="index.html" class="nav-link">
                                    Sidenav
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-side-topnav.html" class="nav-link active">
                                    Sidenav + top nav
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-topnav.html" class="nav-link">
                                    Topnav
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarDashboard" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false"
                                   aria-controls="sidebarDashboard">
                                    Without hero chart
                                </a>
                                <div class="collapse " id="sidebarDashboard">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="dashboard-no-hero.html" class="nav-link ">
                                                Sidenav
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="dashboard-side-topnav-no-hero.html" class="nav-link ">
                                                Sidenav + top nav
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="dashboard-topnav-no-hero.html" class="nav-link">
                                                Topnav
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                        <span class="fe fe-bell"></span> Notifications
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="my-3">

            <!-- Heading -->
            <h6 class="navbar-heading text-muted">
                Documentation
            </h6>

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link " href="getting-started.html">
                        <i class="fe fe-clipboard"></i> Getting started
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false"
                       aria-controls="sidebarComponents">
                        <i class="fe fe-book-open"></i> Components
                    </a>
                    <div class="collapse " id="sidebarComponents">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="components.html#alerts" class="nav-link">
                                    Alerts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#avatars" class="nav-link">
                                    Avatars
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#badges" class="nav-link">
                                    Badges
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#breadcrumb" class="nav-link">
                                    Breadcrumb
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#buttons" class="nav-link">
                                    Buttons
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#button-group" class="nav-link">
                                    Button group
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#cards" class="nav-link">
                                    Cards
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#charts" class="nav-link">
                                    Charts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#dropdowns" class="nav-link">
                                    Dropdowns
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#forms" class="nav-link">
                                    Forms
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#icons" class="nav-link">
                                    Icons
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#lists" class="nav-link">
                                    Lists
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#loaders" class="nav-link">
                                    Loaders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#modal" class="nav-link">
                                    Modal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#navs" class="nav-link">
                                    Navs
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#navbar" class="nav-link">
                                    Navbar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#page-headers" class="nav-link">
                                    Page headers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#pagination" class="nav-link">
                                    Pagination
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#popovers" class="nav-link">
                                    Popovers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#progress" class="nav-link">
                                    Progress
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#social-posts" class="nav-link">
                                    Social post
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#tables" class="nav-link">
                                    Tables
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#tooltips" class="nav-link">
                                    Tooltips
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#typography" class="nav-link">
                                    Typography
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#utilities" class="nav-link">
                                    Utilities
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="changelog.html">
                        <i class="fe fe-git-branch"></i> Changelog <span class="badge badge-primary ml-auto">v1.1.2</span>
                    </a>
                </li>
            </ul>


        </div> <!-- / .navbar-collapse -->

    </div> <!-- / .container-fluid -->
</nav>
