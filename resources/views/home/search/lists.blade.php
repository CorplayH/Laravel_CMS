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
                            <h4 class="card-header-title">搜索结果</h4>
                        </div>

                    </div> <!-- / .row -->
                </div>
                <div class="card-body">

                    <!-- List -->
                    <ul class="list-group list-group-lg list-group-flush list my--4">
                        @foreach($data as $v)
                            @switch($type)
                                @case('article')
                                @include('layout.search.article')
                                @break;
                                @case('topic')
                                @include('layout.search.topic')
                                @break;
                                @case('video')
                                @include('layout.search.video')
                                @break;
                            @endswitch
                        @endforeach
                    </ul>

                </div>
            </div>
{{--            {{$activities->links()}}--}}
        </div>
    </div>
@endsection
