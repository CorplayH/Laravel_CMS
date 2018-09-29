<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand mr-auto" href="{{route('index')}}">
            <img src="{{asset('org/Dashkit/dist/assets')}}/img/logo.svg" alt="..." class="navbar-brand-img">
        </a>

        <!-- User -->
        <div class="navbar-user">

        <!-- Dropdown -->
        @include('layout.home.search')
        @include('layout.notify')
            @include('layout.publish')
        <!-- Dropdown -->
            @include('layout.login_register')

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

            <!-- Navigation -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">
                        {{cms_config('site.title')}}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavDocumentation" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        谈天说地
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="topnavDocumentation">
                        @foreach(\App\Model\Category::get() as $category)
                            <li>
                                <a class="dropdown-item" href="{{route('topic.index',['category_id'=>$category->id])}}">
                                    <i class="{{$category['icon']}} mr-2"></i>{{$category['title']}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('article.index')}}">
                        文章
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('lesson.index')}}">
                        视频课程
                    </a>
                </li>
            </ul>

        </div>

    </div> <!-- / .container -->
</nav>
