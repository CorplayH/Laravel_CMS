@extends('layout.home.master')
@section('content')
    <div class="tab-content mt-3">
        <div class="tab-pane fade active show" id="tabPaneOne" role="tabpanel">
            <div class="row listAlias">
                @foreach($lessons as $lesson)
                <div class="col-12 col-md-6 col-xl-4">

                    <!-- Card -->
                    <div class="card">
                        <a href="{{route ('lesson.show',$lesson)}}">
                            <img height="200" src="{{$lesson['thumb']}}" alt="..." class="card-img-top">
                        </a>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h4 class="card-title mb-2 name">
                                        <a href="project-overview.html">{{$lesson['title']}}</a>
                                    </h4>

                                    <!-- Subtitle -->
                                    <p class="card-text small text-muted">
                                       {{$lesson->updated_at->diffForHumans()}}
                                    </p>

                                </div>
                            </div> <!-- / .row -->

                        </div> <!-- / .card-body -->
                    </div>

                </div>
                @endforeach
            </div> <!-- / .row -->
        </div>
        {{$lessons->links()}}
        <div class="tab-pane fade" id="tabPaneTwo" role="tabpanel">
            <div class="row list">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="project-overview.html" class="avatar avatar-lg avatar-4by3">
                                        <img src="assets/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="card-title mb-1 name">
                                        <a href="project-overview.html">Homepage Redesign</a>
                                    </h4>

                                    <!-- Text -->
                                    <p class="card-text small text-muted mb-1">
                                        <time datetime="2018-06-21">Updated 2hr ago</time>
                                    </p>

                                    <!-- Progress -->
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">

                                            <div class="small mr-2">29%</div>

                                        </div>
                                        <div class="col">

                                            <!-- Progress -->
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                                <div class="col-auto">

                                    <!-- Avatar group -->
                                    <div class="avatar-group d-none d-md-inline-flex">
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                            <img src="assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Adolfo Hess">
                                            <img src="assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Daniela Dewitt">
                                            <img src="assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Miyah Myles">
                                            <img src="assets/img/avatars/profiles/avatar-5.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>

                                </div>
                                <div class="col-auto">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .card-body -->
                    </div>

                </div>
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="project-overview.html" class="avatar avatar-lg avatar-4by3">
                                        <img src="assets/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="card-title mb-1 name">
                                        <a href="project-overview.html">Travels &amp; Time</a>
                                    </h4>

                                    <!-- Text -->
                                    <p class="card-text small text-muted mb-1">
                                        <time datetime="2018-06-21">Updated 5hr ago</time>
                                    </p>

                                    <!-- Progress -->
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">

                                            <div class="small mr-2">77%</div>

                                        </div>
                                        <div class="col">

                                            <!-- Progress -->
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" role="progressbar" style="width: 77%" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                                <div class="col-auto">

                                    <!-- Avatar group -->
                                    <div class="avatar-group d-none d-md-inline-flex">
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                            <img src="assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Adolfo Hess">
                                            <img src="assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Daniela Dewitt">
                                            <img src="assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Miyah Myles">
                                            <img src="assets/img/avatars/profiles/avatar-5.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>

                                </div>
                                <div class="col-auto">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .card-body -->
                    </div>

                </div>
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="project-overview.html" class="avatar avatar-lg avatar-4by3">
                                        <img src="assets/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="card-title mb-1 name">
                                        <a href="project-overview.html">Safari Exploration</a>
                                    </h4>

                                    <!-- Text -->
                                    <p class="card-text small text-muted mb-1">
                                        <time datetime="2018-06-21">Updated 1hr ago</time>
                                    </p>

                                    <!-- Progress -->
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">

                                            <div class="small mr-2">100%</div>

                                        </div>
                                        <div class="col">

                                            <!-- Progress -->
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                                <div class="col-auto">

                                    <!-- Avatar group -->
                                    <div class="avatar-group d-none d-md-inline-flex">
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                            <img src="assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Adolfo Hess">
                                            <img src="assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Daniela Dewitt">
                                            <img src="assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Miyah Myles">
                                            <img src="assets/img/avatars/profiles/avatar-5.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>

                                </div>
                                <div class="col-auto">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .card-body -->
                    </div>

                </div>
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="project-overview.html" class="avatar avatar-lg avatar-4by3">
                                        <img src="assets/img/avatars/projects/project-4.jpg" alt="..." class="avatar-img rounded">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="card-title mb-1 name">
                                        <a href="project-overview.html">Personal Site</a>
                                    </h4>

                                    <!-- Text -->
                                    <p class="card-text small text-muted mb-1">
                                        <time datetime="2018-06-21">Updated 2d ago</time>
                                    </p>

                                    <!-- Progress -->
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">

                                            <div class="small mr-2">12%</div>

                                        </div>
                                        <div class="col">

                                            <!-- Progress -->
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                                <div class="col-auto">

                                    <!-- Avatar group -->
                                    <div class="avatar-group d-none d-md-inline-flex">
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                            <img src="assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Adolfo Hess">
                                            <img src="assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Daniela Dewitt">
                                            <img src="assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Miyah Myles">
                                            <img src="assets/img/avatars/profiles/avatar-5.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>

                                </div>
                                <div class="col-auto">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .card-body -->
                    </div>

                </div>
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="project-overview.html" class="avatar avatar-lg avatar-4by3">
                                        <img src="assets/img/avatars/projects/project-5.jpg" alt="..." class="avatar-img rounded">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="card-title mb-1 name">
                                        <a href="project-overview.html">Wander (iOS)</a>
                                    </h4>

                                    <!-- Text -->
                                    <p class="card-text small text-muted mb-1">
                                        <time datetime="2018-06-21">Updated 4hr ago</time>
                                    </p>

                                    <!-- Progress -->
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">

                                            <div class="small mr-2">80%</div>

                                        </div>
                                        <div class="col">

                                            <!-- Progress -->
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                                <div class="col-auto">

                                    <!-- Avatar group -->
                                    <div class="avatar-group d-none d-md-inline-flex">
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                            <img src="assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Adolfo Hess">
                                            <img src="assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Daniela Dewitt">
                                            <img src="assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Miyah Myles">
                                            <img src="assets/img/avatars/profiles/avatar-5.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>

                                </div>
                                <div class="col-auto">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .card-body -->
                    </div>

                </div>
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="project-overview.html" class="avatar avatar-lg avatar-4by3">
                                        <img src="assets/img/avatars/projects/project-6.jpg" alt="..." class="avatar-img rounded">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="card-title mb-1 name">
                                        <a href="project-overview.html">Wander (Web)</a>
                                    </h4>

                                    <!-- Text -->
                                    <p class="card-text small text-muted mb-1">
                                        <time datetime="2018-06-21">Updated 18hr ago</time>
                                    </p>

                                    <!-- Progress -->
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">

                                            <div class="small mr-2">65%</div>

                                        </div>
                                        <div class="col">

                                            <!-- Progress -->
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                                <div class="col-auto">

                                    <!-- Avatar group -->
                                    <div class="avatar-group d-none d-md-inline-flex">
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                            <img src="assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Adolfo Hess">
                                            <img src="assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Daniela Dewitt">
                                            <img src="assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Miyah Myles">
                                            <img src="assets/img/avatars/profiles/avatar-5.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>

                                </div>
                                <div class="col-auto">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .card-body -->
                    </div>

                </div>
            </div> <!-- / .row -->
        </div>
    </div>
@endsection
