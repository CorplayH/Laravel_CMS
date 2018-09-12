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

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit/dist/assets')}}/css/theme.min.css">

    <title>Dashkit</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">
            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">Sign up</h1>
            <!-- Subheading -->
            <p class="text-muted text-center mb-5"></p>
            <!-- Form -->
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>昵称</label>
                    <input type="text" name="name" class="form-control" placeholder="外卖可乐仔" value="{{old ('name')}}">
                </div>
                <!-- Account -->
                <div class="form-group">
                    <label>Account</label>
                    <input type="text" name="account" class="form-control" value="{{old ('account')}}" placeholder="name@address.com/phone">
                </div>
                {{--验证码--}}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="请输入你接收到的验证码" name="code" value="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="bt">发送验证码</button>
                    </div>
                </div>
                <!-- Password -->
                <div class="form-group">
                    <!-- Label -->
                    <label>Password</label>
                    <!-- Input group -->
                    <div class="input-group input-group-merge">
                        <!-- Input -->
                        <input type="password" name="password" class="form-control form-control-appended" placeholder="Enter your password">
                        <!-- Icon -->
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="fe fe-eye"></i>
                          </span>
                        </div>
                    </div>
                    <!-- Label -->
                    <label>Re-enter Password</label>
                    <div class="input-group input-group-merge">
                        <!-- Input -->
                        <input type="password" name="password_confirmation" class="form-control form-control-appended"
                               placeholder="Re-enter your password">
                        <!-- Icon -->
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="fe fe-eye"></i>
                          </span>
                        </div>
                    </div>
                </div>
                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                    Sign up
                </button>
                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                        Already have an account? <a href="{{route('login')}}">Log in</a>.
                    </small>
                </div>

            </form>

        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Image -->
            <div class="bg-cover vh-100 mt--1 mr--3"
                 style="background-image: url({{asset('org/Dashkit/dist/assets')}}/img/covers/auth-side-cover.jpg);"></div>
        </div>
    </div> <!-- / .row -->
</div>

<!-- JAVASCRIPT
================================================== -->


@include('layout.hdjs')
@include('layout.message')
<script>
    require(['hdjs'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route ('code.send')}}',
            //验证码等待发送时间
            timeout: '{{config ('base.code_expire')}}',
            //表单，手机号或邮箱的INPUT表单
            input: '[name="account"]'
        };
        hdjs.validCode(option);
    })
</script>

</body>
</html>
