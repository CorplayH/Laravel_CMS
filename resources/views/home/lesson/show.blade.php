@extends('layout.home.master')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            {{$lesson->title}}
        </div>
        <div class="card-body">
            {{$lesson->description}}
        </div>

    </div>
    <div class="row">
        <div class="col-12">

            <!-- Files -->
            <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h4 class="card-header-title">
                                视频列表
                            </h4>

                        </div>
                    </div> <!-- / .row -->
                </div>
                <div class="card-body">

                    <!-- List -->
                    <ul class="list-group list-group-lg list-group-flush list my--4">
                        @foreach($lesson->video as $video)
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col ml--2">
                                        <!-- Title -->
                                        <h4 class="card-title mb-1 name">
                                            <a href="{{route ('video.show',[$video,'lesson_id'=>$lesson['id']])}}">
                                              {{$video->title}}
                                            </a>
                                        </h4>
                                    </div>
                                </div> <!-- / .row -->
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection