<!doctype html>
<html lang="en">

<head>
    <title>{{env('PROJECT_TITLE')}} | ورود به حساب </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{asset('admin/favicon.ico')}}" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/animate-css/vivify.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/site.min.css')}}">
    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
</head>

<body class="theme-cyan font-shabnam rtl">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>

<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);">
                <img src="{{asset('admin/assets/images/logo.png')}}" width="30" height="30"
                     class="d-inline-block align-top mr-2">
                {{env('PROJECT_TITLE')}}
            </a>
        </div>
        <div class="card">
            <div class="body">
                <p class="lead mb-4 text-light">وارد حساب کاربری خود شوید</p>

                @error('auth')
                <div class="row">
                    <div class="col-12">
                        <p class="alert alert-danger borderRadius30">
                            {{$message}}
                        </p>
                    </div>
                </div>
                @enderror

                <form method="post" class="form-auth-small m-t-20" action="{{route('login.do')}}">
                    @csrf
                    <div class="form-group">
                        <label for="signin-email" class="control-label d-block text-light text-left font-10pt">
                            نام کاربری
                        </label>
                        <input name="email" type="text" class="form-control round" id="signin-email"
                               placeholder="نام کاربری">
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label d-block text-light text-left font-10pt">رمزعبور</label>
                        <input name="password" type="password" class="form-control round" id="signin-password"
                               placeholder="رمزعبور">
                    </div>

                    <div id="MyCaptchaCode">
                        <img src="{{route('get_captcha', ['c' => time()])}}">
                        <input class="form-control round" type="text" name="captcha_code">
                    </div>

                    <button type="submit" class="btn btn-primary btn-round btn-block">ورود</button>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->

<script src="{{asset('admin/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/bundles/login_mainscripts.js')}}"></script>

@include('sweetalert::alert')
<script>
    $(document).ready(function () {
        var count = 0;

        var clearInp = setInterval(function () {
            if (count < 5) {
                $('input[type=text]').val("");
                $('input[type=password]').val("");
                count++;
            } else {
                clearInterval(clearInp);
            }
        }, 500)

    })
</script>
</body>

</html>
