@extends('layout.admin.master')
@section('content')
    <div class="card">
        <form class="mt-3" action="{{route ('admin.category.update',$category)}}" method="post">
            @csrf @method('PUT')
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm mb-3">
                <li class="nav-item">
                    <a href="{{route ('admin.category.index')}}" class="nav-link ">
                        栏目列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route ('admin.category.create')}}" class="nav-link ">
                        栏目添加
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link active">
                        编辑栏目
                    </a>
                </li>
            </ul>

                <div class="form-group">
                    <label for="">栏目名称</label>
                    <input type="text" name="title" value="{{$category['title']}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">图标</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i id="icon" class="{{$category['icon']}}"></i>
                            </span>
                        </div>
                        <input readonly type="text" value="{{$category['icon']}}" name="icon" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <a href="javascript:;" onclick="chooseIcon()" class="input-group-text">选择图标</a>
                        </div>
                    </div>
                </div>

        </div>
        <div class="card-footer text-muted">
            <button  class="btn btn-primary">保存数据</button>
        </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        function chooseIcon() {
            require(['hdjs'], function (hdjs) {
                hdjs.font(function(icon){
                    $('input[name=icon]').val(icon);
                    $('#icon').attr('class',icon);
                    $('#hdMessage').modal('hide');
                })
            })
        }
    </script>
    @endpush
