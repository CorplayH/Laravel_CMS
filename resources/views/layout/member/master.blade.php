<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset ('org/Dashkit/dist/assets')}}/css/theme.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <title>{{cms_config ('site.title')}}</title>
</head>
<body>
<!-- SIDEBAR
================================================== -->
@yield('menu')
{{--@include('layout.member.menu')--}}
<!-- MAIN CONTENT
================================================== -->
<div class="main-content">
    @include('layout.home.head')
    <div class="container-fluid">
        @yield('content')
    </div>
</div> <!-- / .main-content -->

<!-- JAVASCRIPT
================================================== -->

{{--底部 start--}}
@include('layout.hdjs');
<script>require(['bootstrap'])</script>
@include('layout.message')
@stack('js')
@stack('css')
</body>
</html>
