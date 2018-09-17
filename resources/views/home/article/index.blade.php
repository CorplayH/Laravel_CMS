@extends('layout.home.master')
@section('content')
    <div class="row mt-2">
        <div class="col-9">

            <!-- Files -->
            <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h4 class="card-header-title">
                                文章
                            </h4>

                        </div>
                        <div class="col-auto">
                            <!-- Button -->
                            <a href="{{route ('article.create')}}" class="btn btn-sm btn-primary">
                                发布文章
                            </a>
                        </div>
                    </div> <!-- / .row -->
                </div>

                <div class="card-body">

                    <!-- List -->
                    <ul class="list-group list-group-lg list-group-flush list my--4">
                        @foreach($articles as $article)
                            <li class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded">

                                        </div>
                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="card-title mb-1 name">
                                            <a href="{{route ('article.show',$article)}}">{{$article->title}}</a>
                                        </h4>
                                        <!-- Time -->
                                        <p class="card-text small text-muted">
                                            <span class="fe fe-user "></span> {{$article->user->name}} .
                                            <span class="fe fe-clock "></span> {{$article->created_at->diffForHumans()}}
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Dropdown -->
                                        <div class="dropdown">
                                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
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
            {{$articles->links()}}
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    公告
                </div>
                <div class="card-body">
                    <a href="" class="text-muted">每晚直播</a>
                    <hr>
                    <a href="" class="text-muted">实战培训</a>
                </div>
            </div>
        </div>
    </div>
@endsection
