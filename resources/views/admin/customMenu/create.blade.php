@extends('layout.admin.master')
@section('content')
    <div class="card">
        <form class="mt-3" action="{{route ('news.customMenu.store')}}" method="post">
            @csrf
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route ('news.customMenu.index')}}" class="nav-link ">
                            分类列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route ('news.customMenu.create')}}" class="nav-link active">
                            添加分类
                        </a>
                    </li>
                </ul>
                <div class="form-group mt-3">
                    <label for="">栏目名称</label>
                    <input type="text" name="cname" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">父级分类</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" name="parentId">
                            <option value="0">顶级分类</option>
                            @foreach($allCategories as $category)
                                <option value="{{$category['id']}}">{!! $category['_cname'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary">保存数据</button>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        function chooseIcon() {
            require(['hdjs'], function (hdjs) {
                hdjs.font(function (icon) {
                    $('input[name=icon]').val(icon);
                    $('#icon').attr('class', icon);
                    $('#hdMessage').modal('hide');
                })
            })
        }
    </script>
@endpush
