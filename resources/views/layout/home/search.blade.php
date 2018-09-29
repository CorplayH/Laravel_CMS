<form action="{{route ('search')}}" class="form-inline mr-4 d-none d-lg-flex" id="searchForm">
    <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>
        <div class="input-group ">
            <input type="text" name="keyword" class="form-control">
            <input type="hidden" name="type">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">搜索</button>
                <div class="dropdown-menu " style="right: 0;">
                    <a class="dropdown-item text-right" href="#" onclick="searched('topic')">话题</a>
                    <a class="dropdown-item text-right" href="#" onclick="searched('article')">文章</a>
                    <a class="dropdown-item text-right" href="javascript:;" onclick="searched('video')">视频</a>
                </div>
            </div>

        </div>
    </div>
</form>
<script>
    function searched(type) {
        require(['jquery'],function ($) {
            $('input[name=type]').val(type);
            //触发表单提交
            $('#searchForm').submit();
        })
    }
</script>
