<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/css/theme.min.css">

    <title>{{cms_config ('site.title')}}</title>
</head>
<body>

<!-- MODALS
================================================== -->
<!-- Modal: Members -->
<div class="modal fade" id="modalMembers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-card card" data-toggle="lists" data-lists-values='["name"]'>
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h4 class="card-header-title" id="exampleModalCenterTitle">
                                Add a member
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Close -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                    </div> <!-- / .row -->
                </div>
                <div class="card-header">

                    <!-- Form -->
                    <form>
                        <div class="input-group input-group-flush input-group-merge">
                            <input type="search" class="form-control form-control-prepended search" placeholder="Search">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fe fe-search"></span>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-body">

                    <!-- List group -->
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Miyah Myles</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-success">●</span> Online
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Ryu Duke</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-success">●</span> Online
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Glen Rouse</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-warning">●</span> Busy
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Grace Gross</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-danger">●</span> Offline
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- SIDEBAR
================================================== -->
@include('layout.member.menu')
<!-- MAIN CONTENT
================================================== -->
<div class="main-content">

    <!-- TOPBAR -->
    <nav class="navbar navbar-expand-md navbar-light bg-white d-none d-md-flex">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand mr-auto" href="index.html">
                {{cms_config('site.title')}}
            </a>

            <!-- Form -->
            <form class="form-inline mr-4 d-none d-md-flex">
                <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

                    <!-- Input -->
                    <input type="search" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fe fe-search"></i>
                        </div>
                    </div>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-card">
                        <div class="card-body">

                            <!-- List group -->
                            <div class="list-group list-group-flush list my--3">
                                <a href="team-overview.html" class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Airbnb
                                            </h4>

                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->
                                </a>
                                <a href="team-overview.html" class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Medium Corporation
                                            </h4>

                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->
                                </a>
                                <a href="project-overview.html" class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-4by3">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Homepage Redesign
                                            </h4>

                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a href="project-overview.html" class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-4by3">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Travels & Time
                                            </h4>

                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a href="project-overview.html" class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-4by3">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Safari Exploration
                                            </h4>

                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a href="profile-posts.html" class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Dianna Smiley
                                            </h4>

                                            <!-- Status -->
                                            <p class="text-body small mb-0">
                                                <span class="text-success">●</span> Online
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a href="profile-posts.html" class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Ab Hadley
                                            </h4>

                                            <!-- Status -->
                                            <p class="text-body small mb-0">
                                                <span class="text-danger">●</span> Offline
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                            </div>

                        </div>
                    </div> <!-- / .dropdown-menu -->

                </div>
            </form>

            <!-- User -->
            <div class="navbar-user">

                <!-- Dropdown -->
                <div class="dropdown mr-4 d-none d-md-flex">

                    <!-- Toggle -->
                    <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon active">
                  <i class="fe fe-bell"></i>
                </span>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h5 class="card-header-title">
                                        Notifications
                                    </h5>

                                </div>
                                <div class="col-auto">

                                    <!-- Link -->
                                    <a href="#!" class="small">
                                        View all
                                    </a>

                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .card-header -->
                        <div class="card-body">

                            <!-- List group -->
                            <div class="list-group list-group-flush my--3">
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3 others</strong>.
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Ab Hadley</strong> reacted to your post with a 😍
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Adolfo Hess</strong> commented <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Daniela Dewitt</strong> subscribed to you.
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Miyah Myles</strong> shared your post with <strong class="text-body">Ryu Duke</strong>, <strong class="text-body">Glen Rouse</strong>, and <strong class="text-body">3 others</strong>.
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Ryu Duke</strong> reacted to your post with a 😍
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Glen Rouse</strong> commented <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset ('org/Dashkit/dist/assets')}}/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Grace Gross</strong> subscribed to you.
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                            </div>

                        </div>
                    </div> <!-- / .dropdown-menu -->

                </div>

                <!-- Dropdown -->
                <div class="dropdown">

                    <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth ()->user ()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route ('member.index')}}" class="dropdown-item">{{auth()->user ()->name}}</a>
                        {{--User::where('email',$email)->first()--}}
                        @can('view',auth ()->user ())
                            <a href="{{route ('admin.index')}}" class="dropdown-item">后台管理</a>
                        @endcan
                        <hr class="dropdown-divider">
                        <a href="{{route ('logout')}}" class="dropdown-item">退出</a>
                    </div>

                </div>

            </div>

        </div> <!-- / .container-fluid -->
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>

</div> <!-- / .main-content -->

<!-- JAVASCRIPT
================================================== -->

@include('layout.hdjs');
<script>require(['bootstrap'])</script>
@include('layout.message')
@stack('js')
@stack('css')
</body>
</html>
