@extends('layout.admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-header-title">
                模板管理
            </h4>

        </div>
        <div class="card-body">

            <div class="row">
                @foreach($configs as $config)
                    <div class="col-3">
                        <img src="{{$config['preview']}}" style="width: 100%;">
                        @if(config('hd_template.template') == $config['name'])
                            <a href="{{route('admin.set_template',['name' => $config['name']])}}" class="btn btn-success btn-block btn-sm">{{$config['title']}}</a>
                        @else
                            <a href="{{route('admin.set_template',['name' => $config['name']])}}" class="btn btn-secondary btn-block btn-sm">{{$config['title']}}</a>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>

    </div>
@endsection
