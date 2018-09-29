@extends('layout.admin.master')
@section('head')
    <link rel="stylesheet" href="{{asset('org/wx/wxMenu.css')}}">
@endsection
@section('content')
    <div class="card" id="app">
        <form class="mt-3" action="{{route ('wechat.wxMenu.update',$wxMenu)}}" method="post">
            @csrf @method('PUT')
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route ('wechat.wxMenu.index')}}" class="nav-link ">
                            菜单列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route ('wechat.wxMenu.create')}}" class="nav-link">
                            菜单添加
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route ('wechat.wxMenu.edit',$wxMenu)}}" class="nav-link active">
                            菜单修改
                        </a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-4">
                        <div class="phone">
                            <div class="phoneContainer">
                                <div class="menu" v-for="(v,k) in menus.button">
                                    <h5 @click="active(v)" ><span @click="delTopMenu(k)" class="fa fa-minus-circle"></span>@{{v.name}}</h5>
                                    <dd>
                                        <dl v-if="v.sub_button.length<5" @click="addSubMenu(v)"><span class="fe fe-plus-circle"></span>添加二级</dl>
                                        <dl @click="active(m)" v-for="(m,n) in v.sub_button"><span @click="delSubMenu(v,n)" class="fe fe-x-circle"></span>@{{m.name}}</dl>
                                    </dd>
                                </div>
                                <div class="menu" v-if="menus.button.length<3">
                                    <h5 @click="addTopMenu()"><span class="fa fa-plus-circle"></span>添加菜单</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="form-group">
                                    <label for="">菜单组名</label>
                                    <input type="text" name="name" value="{{$wxMenu->name}}" id="" class="form-control">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">菜单名</label>
                                    <input type="text" v-model="activeMenu.name" id="" class="form-control">
                                </div>
                                <label for="">触发:</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" v-model="activeMenu.type" id="inlineRadio1" value="view">
                                        <label class="form-check-label" for="inlineRadio1">url</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" v-model="activeMenu.type"  id="inlineRadio2" value="click">
                                        <label class="form-check-label" for="inlineRadio2">关键词</label>
                                    </div>
                                </div>
                                <div class="form-group" v-if="activeMenu.type == 'view'" >
                                    <label for="">url</label>
                                    <input type="text" v-model="activeMenu.url" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group" v-if="activeMenu.type == 'click'">
                                    <label for="">关键词</label>
                                    <input type="text" v-model="activeMenu.key" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <textarea hidden name="data" id="" cols="80" rows="5">@{{ menus }}</textarea>
                            </div>
                            <button class="btn btn-success">保存数据</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    {{--hdjs?? require??--}}
    <script>
        require(["{{asset ('org/wx/wxMenu.js')}}"],function (index) {
            index({!! json_encode($wxMenu->data) !!});
        });
    </script>
@endpush
