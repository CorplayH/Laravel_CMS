{{--@extends('layout.home.master')--}}
{{--@section('content')--}}
    {{--Home index--}}
{{--@endsection--}}


@extends('layout.home.master')
@section('content')
    <div class="row">
        <div class="col-12">

            <!-- Files -->
            <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h4 class="card-header-title">
                                动态
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Dropdown -->
                            <div class="dropdown">

                                <!-- Toggle -->
                                <a href="#!" class="small text-muted dropdown-toggle" data-toggle="dropdown">
                                    筛选
                                </a>

                                <!-- Menu -->
                                <div class="dropdown-menu">
                                    <a class="dropdown-item sort" data-sort="name" href="{{route ('index')}}">
                                        全部
                                    </a>
                                    <a class="dropdown-item sort" data-sort="name" href="{{route ('index',['t'=>'follower'])}}">
                                        关注
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div> <!-- / .row -->
                </div>
                <div class="card-body">

                    <!-- List -->
                    <ul class="list-group list-group-lg list-group-flush list my--4">
                        @foreach($activities as $activity)
                            @switch($activity->log_name)
                                @case('comment')
                                @include('layout.activities.activity_comment')
                                @break;
                                @case('article')
                                @include('layout.activities.activity_article')
                                @break;
                                @case('topic')
                                @include('layout.activities.activity_topic')
                                @break;
                            @endswitch
                        @endforeach
                    </ul>

                </div>
            </div>
            {{$activities->links()}}
        </div>
    </div>
@endsection
