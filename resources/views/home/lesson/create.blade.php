@extends('layout.admin.master')
@section('menu')
    <div class="card">
        <div class="card-header">
            <div>
                <span class="fe fe-user"></span> 内容管理
            </div>
        </div>
        <div class="card-body">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a href="{{route ('member.user.edit',[auth ()->user (),'type'=>'icon'])}}" class="nav-link active">课程管理</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{route('lesson.store')}}" method="post" id="app">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('lesson.lists')}}" class="nav-link ">
                                课程列表
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('lesson.create')}}" class="nav-link active">
                                课程添加
                            </a>
                        </li>
                    </ul>
                    <div class="mt-2">
                        <div class="form-group">
                            <label for="">课程标题</label>
                            <input type="text" v-model="field.lesson.title" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">课程描述</label>
                            <input type="text" v-model="field.lesson.description"  class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">缩略图</label>
                                <div class="input-group mb-1">
                                    <input class="form-control " v-model="field.lesson.thumb" readonly="" value="">
                                    <div class="input-group-append">
                                        <button @click="upImagePic()" class="btn btn-secondary" type="button">单图上传</button>
                                    </div>
                                </div>
                                <div style="display: inline-block;position: relative;">
                                    <img :src="field.lesson.thumb" class="img-responsive img-thumbnail" width="150">
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-header">
                视频
                <div class="col text-right">
                    <a href="" @click.prevent="add" class="btn btn-white btn-sm">添加</a>
                </div>
            </div>
            <div class="card-body" v-for="(v,k) in field.video">
                <div class="form-group">
                    <label for="">视频标题</label>
                    <input type="text" v-model="v.title" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">地址</label>
                    <input type="text" v-model="v.path" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <a @click="del(k)" class="btn btn-danger btn-sm">删除</a>
            </div> 
        </div>
        <textarea hidden name="field">@{{field}}</textarea>
        <button class="btn btn-info">提交</button>
    </form>
@endsection
@push('js')
    <script>
        require(['hdjs','vue','jquery'],function (hdjs,Vue,$) {
            new Vue({
                el:'#app',
                data:{
                    field:{!! json_encode ($field) !!}
                },
                methods:{
                    add(){
                        this.field.video.push({title:'',path:''});
                    },
                    del(index){
                        this.field.video.splice(index,1);

                    },
                    upImagePic(){
                        var options = {
                            multiple: false,//是否允许多图上传
                            //data是向后台服务器提交的POST数据
                            data: {name: '后盾人', year: 2099},
                        };
                        hdjs.image( (images) =>{
                            this.field.lesson.thumb = images[0]
                        }, options)
                    }
                }
            })
        })
    </script>
@endpush
@push('css')
    <style>
        .avatar{
            cursor: pointer;
        }
    </style>
@endpush
