
@auth()
    <div class="dropdown mr-4 d-none d-lg-flex">
        <!-- Toggle -->
        <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="icon"><i class="fe fe-edit"></i></span>
        </a>
        <!-- Menu -->
        <div class="dropdown-menu dropdown-menu-right ">
            <div class="card-body">
                <!-- List group -->
                <div class="list-group list-group-flush my--3">
                    <a href="{{route ('article.create')}}" class="dropdown-item"><i class="fa fa-paint-brush mr-2"></i>发布文章</a>
                    发表话题
                    @foreach(\App\Model\Category::get() as $category)
                        <a href="{{route('topic.create',['category_id'=>$category])}}" class="dropdown-item">
                            <i class="{{$category['icon']}} mr-2"></i>
                            {{$category['title']}}</a>
                    @endforeach
                </div>
            </div>
        </div> <!-- / .dropdown-menu -->
    </div>
@endauth
