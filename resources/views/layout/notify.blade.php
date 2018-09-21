{{--//消息通知组件--}}
@auth()
<div class="dropdown mr-4 d-none d-lg-flex">

    <!-- Toggle -->
    <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="icon @if(auth ()->user ()->unreadNotifications()->count()) active @endif"><i class="fe fe-bell"></i></span>
    </a>

    <!-- Menu -->
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Title -->
                    <h5 class="card-header-title">
                        消息通知（{{auth ()->user ()->unreadNotifications()->count()}}）
                    </h5>

                </div>
                <div class="col-auto">

                    <!-- Link -->
                    <a href="{{route ('member.notify.index')}}" class="small">
                        查看全部
                    </a>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .card-header -->
        <div class="card-body">
            <!-- List group -->
            <div class="list-group list-group-flush my--3">
                @foreach(auth ()->user ()->unreadNotifications()->limit(5)->get() as $notification)
                    <a class="list-group-item px-0" href="{{route('member.notify.show',$notification)}}">
                        <div class="row">
                            <div class="col-auto">
                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{$notification['data']['user_icon']}}" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </div>
                            <div class="col ml--2">
                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">{{$notification['data']['user_name']}}</strong>
                                    评论了
                                    <strong class="text-body">
                                        {{$notification['data']['title']}}
                                    </strong>,
                                </div>
                            </div>
                            <div class="col-auto">
                                <small class="text-muted">
                                    {{$notification->created_at->diffForHumans()}}
                                </small>
                            </div>
                        </div> <!-- / .row -->
                    </a>
                @endforeach
            </div>
        </div>
    </div> <!-- / .dropdown-menu -->

</div>
@endauth
