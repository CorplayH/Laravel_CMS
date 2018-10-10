@extends('layout.admin.master')
@section('head')
    <link rel="stylesheet" href="{{asset('css/news.css')}}">
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
@endsection
@section('content')
    <form action="{{route('wechat.news.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('wechat.news.index')}}" class="nav-link">
                            图文回复列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('wechat.news.create')}}" class="nav-link active">
                            添加图文回复
                        </a>
                    </li>
                </ul>
                {{--规则和关键词模板--}}
                {!! $ruleView !!}
                {{--图文内容模板--}}
                <div class="row" id="news" v-cloak="">
                    <div class="col-sm-4">
                        <div class="news">
                            <div class="first" v-for="(v,k) in news" v-if="k == 0">
                                <img :src="v.picurl" alt="">
                                <p>@{{ v.title }}</p>
                                <div class="edit">
                                    <button class="btn btn-secondary btn-sm" type="button" @click="edit(v)">编辑</button>
                                    <button class="btn btn-secondary btn-sm" type="button" @click="del(k)">删除</button>
                                    <button class="btn btn-secondary btn-sm" type="button" v-if="k < news.length - 1" @click="next(k)">下移
                                    </button>
                                </div>
                            </div>
                            <div class="item" v-for="(v,k) in news" v-if="k > 0">
                                <img :src="v.picurl" alt="">
                                <p>@{{ v.title }}</p>
                                <div class="edit">
                                    <button class="btn btn-secondary btn-sm" type="button" @click="edit(v)">编辑</button>
                                    <button class="btn btn-secondary btn-sm" type="button" @click="del(k)">删除</button>
                                    <button class="btn btn-secondary btn-sm" type="button" @click="prev(k)">上移</button>
                                    <button class="btn btn-secondary btn-sm" type="button" v-if="k < news.length - 1" @click="next(k)">下移
                                    </button>
                                </div>
                            </div>
                            <div class="pt-2">
                                <button class="btn btn-secondary btn-block" type="button" @click="add()" v-if="news.length < 8">添加图文
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">标题</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input id="inputSmall" type="text" class="form-control form-control-sm" v-model="active.title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">描述</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea class="form-control-sm form-control" id="" cols="30" rows="4"
                                          style="resize: none;" v-model="active.discription">描述</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">缩略图</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-1">
                                    <input class="form-control  form-control-sm" name="thumb" readonly="" :value="active.picurl">
                                    <div class="input-group-append">
                                        <button @click="upImagePc()" class="btn-sm btn-secondary" type="button">单图上传</button>
                                    </div>
                                </div>
                                <div style="display: inline-block;position: relative;">
                                    <img :src="active.picurl" class="img-responsive img-thumbnail" width="150">
                                    <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                                        onclick="removeImg(this)">×</em>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">链接地址</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input id="inputSmall" type="text" class="form-control form-control-sm" v-model="active.url">
                            </div>
                        </div>
                    </div>
                    <textarea name="data" hidden id="" cols="30" rows="10">@{{ news }}</textarea>
                </div>

            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">保存数据</button>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        require(['vue', 'hdjs'], function (vue, hdjs) {
            new vue({
                el: '#news',
                data: {
                    news: [], //所有图文消息
                    active: {}, //当前操作的图文消息
                },
                methods: {
                    upImagePc() {
                        hdjs.image((images) => {
                            //将获取到的图片地址,赋值给当前操作的图文消息的picurl
                            this.active.picurl = images[0];
                        })
                    },
                    //添加图文
                    add() {
                        //判断如果图文消息的数量小于8个才能添加
                        if (this.news.length < 8) {
                            var item = {title: '', discription: '', picurl: '{{asset('images/default.jpg')}}', url: ''};
                            this.news.push(item);
                            //将添加的数据设置给active变成当前操作的图文消息
                            this.active = item;
                        }
                    },
                    // 删除图文
                    del(k) {
                        this.news.splice(k, 1);
                    },
                    //编辑当前图文
                    edit(v) {
                        //将方法获取到的对象赋值给active当前操作的数据
                        this.active = v;
                    },
                    //上移
                    prev(k) {
                        //找到当前news图文消息中的第k条数据
                        var item = this.news[k];
                        //将当前图文数据变成下面一个的图文数据
                        this.news.splice(k, 1, this.news[k - 1]);
                        //将下面的图文数据变成当前的图文数据
                        this.news.splice(k - 1, 1, item);
                    },
                    // 下移
                    next(k) {
                        //找到当前news图文消息中的第k条数据
                        var item = this.news[k];
                        //将当前图文数据变成下面一个的图文数据
                        this.news.splice(k, 1, this.news[k + 1]);
                        //将下面的图文数据变成当前的图文数据
                        this.news.splice(k + 1, 1, item);
                    }
                }
            })
        })
    </script>
@endpush
