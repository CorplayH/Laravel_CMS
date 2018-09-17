@extends('layout.home.master')
@section('content')
    <div class="row mt-2">
        <div class="col-9">
            <div class="card card-body p-5">

                <div class="row">
                    <div class="col text-center">
                        <!-- Title -->
                        <h2 class="mb-3">
                            {{$article->title}}
                        </h2>
                        <p class="card-text small text-muted">
                            <span class="fe fe-user "></span> {{$article->user->name}} .<span
                                class="fe fe-clock "></span> {{$article->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div> <!-- / .row -->
                <hr>
                <div class="content mt-3">
                    {{--{!!$fullcontent!!}--}}
                    {{$article->content}}
                    <hr>

                    @auth()
                        <div class="text-center">
                            @if($isZan)
                                <a href="{{route ('article.zan',$article)}}" class="btn btn-danger"><span class="fe fe-thumbs-down "></span>取消赞</a>
                            @else
                                <a href="{{route ('article.zan',$article)}}" class="btn btn-info"><span class="fe fe-thumbs-up "></span>点个赞呗</a>
                            @endif
                        </div>
                    @endauth

                </div>
                <div class="avatar">
                    @foreach($users as $user)
                        <img src="{{$user->icon}}" alt="..." class="avatar-img rounded-circle">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    {{$article->user->name}}
                </div>
                <div class="card-body text-center">
                    <div class="avatar avatar-xl">
                        <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </div>
                @auth()
                    @can('isSub',$article->user)
                        <div class="card-footer">
                            @if(auth ()->user ()->isfollowing($article->user))
                                <a href="{{route ('member.toggleFollow',$article->user)}}" class="btn btn-danger btn-block">取消关注</a>

                            @else
                                <a href="{{route ('member.toggleFollow',$article->user)}}" class="btn btn-white btn-block"><span
                                        class="fe fe-plus "></span>关注</a>

                            @endif
                        </div>
                    @endcan
                @endauth
            </div>
        </div>
    </div>

@endsection
