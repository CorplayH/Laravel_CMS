@extends('layout.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Files -->
            <div class="card" data-toggle="lists" data-lists-values="">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col mt-5">
                            <!-- Title -->
                            <h4 class="card-header-title">
                                新闻
                            </h4>

                        </div>
                        <div class="col-auto mt-5">
                            <!-- Button -->
                            <a href="{{route ('news.news.create')}}" class="btn btn-sm btn-primary">
                                发布新闻
                            </a>
                        </div>
                    </div> <!-- / .row -->
                </div>
                <div class="card-body">
                    <!-- List -->
                    <ul class="list-group list-group-lg list-group-flush list my--4">
                        @foreach( $allNews as $news)
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{$news->thumb}}" alt="..." class="avatar-img rounded">
                                        </div>
                                    </div>
                                    <div class="col ml--2">
                                        <!-- Title -->
                                        <h4 class="card-title mb-1 name">
                                            <a href="">{{$news->title}}</a>
                                        </h4>
                                        <!-- Time -->
                                        <p class="card-text small text-muted">
                                            <span class="fe fe-user "> {{$news->author}} </span>
                                            <span class="fe fe-clock "></span> {{$news->created_at->diffForHumans()}}
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
                                                <a href="{{route('news.news.edit',$news)}}" class="dropdown-item">编辑</a>
                                                <a href="javascript:;" onclick="del(this)" class="dropdown-item">删除</a>
                                                <form action="{{route('news.news.destroy',$news)}}" method="post">
                                                    @csrf @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{$allNews->links()}}
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(obj) {
            if (confirm('确定删除吗?')) {
                $(obj).next('form').trigger('submit');
            }
        }
    </script>
@endpush
