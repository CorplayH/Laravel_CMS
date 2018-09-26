@extends('layout.home.master')
@section('content')

    <div class="row mt-2">
        <div class="col-9">
            <div class="card card-body p-5">
                @auth()
                    <div class="row">
                        <div class="col text-right">
                            @if($article->isFavorite(auth ()->user ()))
                                <a href="{{route ('common.favorite.make',['model'=>'Article','id'=>$article->id])}}"
                                   class="btn btn-danger btn-sm">取消收藏</a>
                            @else
                                <a href="{{route ('common.favorite.make',['model'=>'Article','id'=>$article->id])}}"
                                   class="btn btn-white btn-sm">收藏</a>
                            @endif
                        </div>
                    </div>
                @endauth
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
                    <div id="Markdown">
                        {!! $article->markdown !!}
                    </div>
                    <hr>
                    @auth()
                        <div class="text-center">
                            @if($article->isZan(auth ()->user ()))
                                <a href="{{route ('common.zan.make',['model'=>'Article','id'=>$article['id']])}}"
                                   class="btn btn-danger"><span class="fe fe-thumbs-down "></span>取消赞</a>
                            @else
                                <a href="{{route ('common.zan.make',['model'=>'Article','id'=>$article['id']])}}" class="btn btn-info"><span
                                        class="fe fe-thumbs-up "></span>点个赞呗</a>
                            @endif
                        </div>
                    @endauth

                </div>
                <div class="row">
                    @foreach($article->zan ()->with(['user'])->get() as $zanUser)
                        <div class="avatar mr-2">
                            <img src="{{$zanUser->user->icon}}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    @endforeach
                </div>
            </div>
            {{--加载模板时候，将mode传递过去--}}
            @include('layout.common.comment',['model'=>$article])
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
@push('js')
    <script>
        require(['prism'])
    </script>
@endpush
