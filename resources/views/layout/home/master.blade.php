<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit/dist/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/dist/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/dist/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/dist/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/dist/assets')}}/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit/dist/assets')}}/css/theme.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Corplay的小屋</title>
</head>
<body>

<!-- TOPNAV
================================================== -->
@include('layout.home.head')
<!-- MAIN CONTENT
================================================== -->
<div class="container">
    @yield('content')

</div> <!-- / .main-content -->
@include('layout.home.footer')
<!-- JAVASCRIPT
================================================== -->

{{--引入 hdjs--}}
@include('layout.hdjs')
{{--引入message提示消息的组件，必须在hdjs之后--}}
@include('layout.message')
<script>
    //加载bootstrap.js文件
    require(['bootstrap'])
</script>
@stack('js')
@stack('css')
</body>
</html>
