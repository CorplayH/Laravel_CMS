@extends('layout.home.master')
@section('content')
    <form action="{{route ('topic.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                话题[ {{$category->title}} ]发布
                <input type="text" name="category_id" value="{{$category->id}}" hidden id="" class="form-control">
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">标题</label>
                    <input type="text" name="title" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">内容</label>
                    <div id="editormd">
                        <textarea name="content" style="display:none;"></textarea>
                        {{--<textarea name="editormd-html-code"  style="display:none;"></textarea>--}}
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
                toolbarIcons : function() {
                    return [
                        "bold", "del", "italic", "quote","|",
                        "list-ul", "list-ol", "hr", "|",
                        "link", "hdimage", "code-block", "|",
                        "watch", "preview", "fullscreen"
                    ]
                },
                //editor.md库位置
                path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                // saveHTMLToTextarea : true
            });
            // editormd.getHTML();
        });
    </script>
@endpush
