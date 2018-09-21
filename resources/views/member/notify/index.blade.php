@extends('layout.member.master')
@section('menu')
    @include('layout.member.notify_menu')
@endsection
@section('content')
    <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">
                        通知列表
                    </h4>

                </div>

            </div> <!-- / .row -->
        </div>

        <div class="card-body">

            <!-- List -->
            <ul class="list-group list-group-lg list-group-flush list my--4">
                @foreach (auth ()->user ()->notifications as $notification)
                    <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            <p class="text-body small mb-0">
                                @if($notification->read_at)
                                    <span class="text-muted">●</span>
                                @else
                                    <span class="text-success">●</span>
                                @endif
                            </p>
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar">
                                    <img src="{{$notification->data['user_icon']}}" alt="..." class="avatar-img rounded">

                                </div>
                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1 name">
                                    <a href="{{route ('member.notify.show',$notification)}}">
                                        {{$notification['data']['title']}}.
                                    </a>
                                </h4>


                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <span class="fe fe-user "></span> {{$notification['data']['user_name']}} .
                                    <span class="fe fe-clock "></span> {{$notification->created_at->diffForHumans()}} .

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
                                            查看详情
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            编辑
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            删除
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                    </li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection
