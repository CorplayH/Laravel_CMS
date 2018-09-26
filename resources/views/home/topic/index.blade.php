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
                                谈天说地 [{{$category->title}}]
                            </h4>

                        </div>
                        <div class="col-auto">
                            <!-- Button -->
                            <a href="{{route ('topic.create',['category_id'=>$category])}}" class="btn btn-sm btn-primary">
                                发布话题
                            </a>
                        </div>
                    </div> <!-- / .row -->
                </div>

                <div class="card-body">

                    <!-- List -->
                    <ul class="list-group list-group-lg list-group-flush list my--4">
                        @foreach($topics as $topic)
                            <li class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{$topic->user->icon}}" alt="..." class="avatar-img rounded">

                                        </div>
                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="card-title mb-1 name">
                                            <a href="{{route ('topic.show',$topic)}}">{{$topic->title}}</a>
                                        </h4>
                                        <!-- Time -->
                                        <p class="card-text small text-muted">
                                            <span class="fe fe-user "></span> {{$topic->user->name}} .
                                            <span class="fe fe-clock "></span> {{$topic->created_at->diffForHumans()}}
                                            @auth()
                                                @if(auth ()->check() && $topic->isZan(auth ()->user ()))
                                                    <a href="{{route ('common.zan.make',['model'=>'Topic','id'=>$topic['id']])}}"><span
                                                            class="fe fe-thumbs-up " style="color: red"></span>
                                                        {{$topic->zan_num}}</a>个赞
                                                @else
                                                    <a href="{{route ('common.zan.make',['model'=>'Topic','id'=>$topic['id']])}}"><span
                                                            class="fe fe-thumbs-up "></span> {{$topic->zan_num}}</a>个赞 .
                                                @endif
                                            @else
                                                <a href="{{route ('login')}}">
                                                    <span class="fe fe-thumbs-up "></span> {{$topic->zan_num}}</a>个赞 .
                                            @endauth

                                            @auth()
                                                @if(auth ()->check() && $topic->isFavorite(auth ()->user ()))
                                                    <a href="{{route ('common.favorite.make',['model'=>'Topic','id'=>$topic['id']])}}">
                                                        <span class="fe fe-heart " style="color: red"></span> {{$topic->favorite_num}}
                                                    </a>
                                                    收藏
                                                @else
                                                    <a href="{{route ('common.favorite.make',['model'=>'Topic','id'=>$topic['id']])}}">
                                                        <span class="fe fe-heart "></span> {{$topic->favorite_num}}
                                                    </a>收藏
                                                @endif
                                            @else
                                                <a href="{{route ('login')}}">
                                                    <span class="fe fe-heart "></span> {{$topic->favorite_num}}</a>个赞 .
                                            @endauth

                                        </p>
                                    </div>
                                    @auth()
                                    <div class="col-auto">
                                        <!-- Dropdown -->
                                        @if(Auth::user()->can('update',$topic)|| Auth::user()->can('delete',$topic))
                                            <div class="dropdown">
                                                <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @can('update',$topic)
                                                        <a href="{{route('topic.edit',$topic)}}" class="dropdown-item">编辑</a>
                                                    @endcan
                                                    @can('delete',$topic)
                                                        <a href="javascript:;" onclick="del(this)" class="dropdown-item">删除</a>
                                                        <form action="{{route('topic.destroy',$topic)}}" method="post">
                                                            @csrf @method('DELETE')
                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div> <!-- / .row -->
@endauth
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            {{$topics->links()}}
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
@push('js')
    <script>
        // function del(obj) {
        //     if (confirm('确定删除吗?')){
        //         $(obj).next('form').trigger('submit');
        //     }
        // }
        function del(obj) {
            require(['https://cdn.bootcss.com/sweetalert/2.1.0/sweetalert.min.js'], function (swal) {
                swal({
                    text: "确定删除吗?",
                    buttons: {
                        cancel: "取消",
                        defeat: '确定',
                    },
                }).then((value) => {
                    switch (value) {
                        case "defeat":
                            $(obj).next('form').trigger('submit');
                            break;
                    }
                });
            })
        }

    </script>
@endpush
