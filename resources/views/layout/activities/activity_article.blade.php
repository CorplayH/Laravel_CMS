<li class="list-group-item px-0">
    <div class="row align-items-center">
        <div class="col-auto">

            <!-- Avatar -->
            <a href="{{route ('member.user.show',$activity->causer)}}" class="avatar avatar-lg">
                <img src="{{$activity->causer->icon}}" alt="..." class="avatar-img rounded">
            </a>

        </div>
        <div class="col ml--2">

            <!-- Title -->
            <h4 class="card-title mb-1 name">
                <a href="{{route ('article.show',$activity->subject)}}">
                    {{$activity->causer->name}}
                    发表了
                    {{$activity->subject->title}}
                </a>
            </h4>

            <!-- Time -->
            <p class="card-text small text-muted">
                <time datetime="2018-01-03">{{$activity->created_at->diffForHumans()}}</time>
            </p>

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

</li>
