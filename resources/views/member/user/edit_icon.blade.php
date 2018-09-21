@extends('layout.member.master')
@section('menu')
    @include('layout.member.menu')
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="card col-sm-6">
            <div class="card-header">
                头像设置
            </div>
            <div class="card-body text-center">
                <div class="avatar avatar-xxl" onclick="upImagePc(this)">
                    <form id="uploadImage" action="{{route('member.user.update',auth ()->user ())}}" method="post">
                        @csrf @method('PUT')
                        <input type="hidden" name="icon" value="{{$user->icon}}">
                    </form>
                    {{--可以使用该方式读取用户头像信息--}}
                    {{--{{auth ()->user ()->icon}}--}}
                    <img src="{{$user->icon}}" alt="..." class="avatar-img rounded-circle">
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                var options = {
                    multiple: false,//是否允许多图上传
                    //data是向后台服务器提交的POST数据
                    data: {},
                };
                hdjs.image(function (images) {
                    //console.log(images);
                    //上传成功的图片，数组类型
                    $("[name='icon']").val(images[0]);
                    $(".avatar img").attr('src', images[0]);
                    //触发表单提交
                    $('#uploadImage').submit();

                }, options)
            });
        }
    </script>
@endpush
@push('css')
    <style>
        .avatar{
            cursor: pointer;
        }
    </style>
@endpush
