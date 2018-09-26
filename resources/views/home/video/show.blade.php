@extends('layout.home.master')
@section('content')
       <!--如果需要加速则需要添加class VideoSpeed-->
       <video id="my-video" class="video-js vjs-big-play-centered VideoSpeed mt-3" controls preload="auto" width="1200" height="550" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
           <source src="{{$video['path']}}" type="video/mp4">
           <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
           <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
           <p class="vjs-no-js">
               {{--要查看此视频，请启用JavaScript，并考虑升级到web浏览器--}}
               <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
           </p>
       </video>
            <div class="card mt-6" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                <div class="card-body">

                    <!-- List -->
                    <ul class="list-group list-group-lg list-group-flush list my--4">
                        @foreach($videos as $video)
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col ">
                                        <!-- Title -->
                                        <h4 class="card-title mb-1 name">
                                            <a href="{{route ('video.show',[$video,'lesson_id'=>$video['lesson_id']])}}">
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
@endsection
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.video('my-video',function(obj){
            });
        })
    </script>
    @endpush
