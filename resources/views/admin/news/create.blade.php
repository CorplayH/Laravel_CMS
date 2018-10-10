@extends('layout.admin.master')
@section('content')
    <form action="{{route ('news.news.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                新闻发布
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">新闻标题</label>
                    <input type="text" value="{{old('title')}}" name="title" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">新闻简介</label>
                    <input type="text" value="{{old('description')}}" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">作者</label>
                    <input type="text" value="{{old('author')}}" name="author" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">来源</label>
                    <input type="text" value="{{old('source')}}" name="source" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">点击数</label>
                    <input type="text" value="{{old('click')}}" name="click" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">缩略图</label>
                    <div class="col-sm-12 p-0">
                        <div class="input-group mb-1">
                            <input class="form-control" value="{{old('thumb')}}" name="thumb" readonly="" value="">
                            <div class="input-group-append">
                                <button onclick="upImagePc(this)" class="btn btn-secondary" type="button">单图上传
                                </button>
                            </div>
                        </div>
                        <div style="display: inline-block;position: relative;">
                            <img src="{{asset('images/default.jpg')}}" class="img-responsive img-thumbnail"
                                 width="150">
                            <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                                onclick="removeImg(this)">×</em>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">选择分类</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" name="news_category_id">
                            <option value="0">顶级分类</option>
                            @foreach($allCategories as $category)
                                <option value="{{$category['id']}}">{!! $category['_cname'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">新闻内容</label>
                    <div id="editormd">
                        <textarea name="content" style="display:none;">{{old('content')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary">提交</button>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.editormd("editormd", {
                width: '100%',
                height: 300,
                toolbarIcons: function () {
                    return [
                        "bold", "del", "italic", "quote", "|",
                        "list-ul", "list-ol", "hr", "|",
                        "link", "hdimage", "code-block", "|",
                        "watch", "preview", "fullscreen"
                    ]
                },
                //editor.md库位置
                path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                saveHTMLToTextarea: true
            });
            editormd.getHTML();
        });

        //上传图片
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                var options = {
                    multiple: false,//是否允许多图上传
                    //data是向后台服务器提交的POST数据
                    data: {name: '后盾人', year: 2099},
                };
                hdjs.image(function (images) {
                    //上传成功的图片，数组类型
                    $("[name='thumb']").val(images[0]);
                    $(".img-thumbnail").attr('src', images[0]);
                }, options)
            });
        }

        //移除图片
        function removeImg(obj) {
            $(obj).prev('img').attr('src', '../dist/static/image/nopic.jpg');
            $(obj).parent().prev().find('input').val('');
        }
    </script>
@endpush
