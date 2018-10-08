@extends('layout.admin.master')

@section('content')
    <form action="{{route('wechat.keywordReply.update',$keywordReply)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('wechat.keywordReply.index')}}" class="nav-link">
                            文本回复列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('wechat.keywordReply.create')}}" class="nav-link active">
                            添加文本回复
                        </a>
                    </li>
                </ul>
                {{--规则和关键词模板--}}
                {!! $ruleView !!}
                {{--回复内容模板--}}
                <div class="row" id="contents">
                    <h1>@{{ contents }}</h1>
                    <div class="form-group col-12" v-for="(v,k) in contents">
                        <label for="">回复内容</label>
                        <textarea name="" class="form-control" cols="30" rows="3" v-model="v.content"></textarea>
                        <a href="javascript:;" class="btn btn-success btn-sm"> <i class="fa fa-github-alt"
                                                                                  aria-hidden="true"></i> 表情</a>
                        <button class="btn btn-danger btn-sm" type="button" @click="delContents(k)">删除</button>
                    </div>

                    <button class="btn btn-info" type="button" @click="addContents()">添加回复内容</button>
                    <textarea name="data" id="" cols="30" rows="10">@{{ contents }}</textarea>
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
        require(['hdjs', 'vue', 'jquery'], function (hdjs, Vue, $) {
            new Vue({
                el: '#contents',
                data: {
                    contents: {!! $keywordReply->data !!}
                },
                mounted() {
                    this.emotion();
                },
                updated() {
                    this.emotion();
                },
                methods: {
                    //表情方法
                    emotion() {
                        var This = this;
                        $.each($('#contents textarea'), function () {
                            hdjs.emotion({
                                //点击的元素，可以为任何元素触发
                                btn: $(this).next('a'),
                                //选中图标后填入的文本框
                                input: $(this),
                                //选择图标后执行的回调函数
                                callback: function (con, btn, input) {
                                    //首先需要获取当前插入图标的文本框的编号
                                    var index = $(input).index('#contents textarea');
                                    This.contents[index].content = $(input).val();
                                }
                            });
                        })
                    },
                    //添加回复内容
                    addContents() {
                        var item = {content: ''};
                        this.contents.push(item);
                    },
                    //删除回复内容
                    delContents(k) {
                        this.contents.splice(k, 1);
                    }
                }
            })
        })
    </script>
@endpush
