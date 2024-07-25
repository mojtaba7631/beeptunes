<!doctype html>
<html lang="en">

<head>
    <title>@yield('Title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="icon" href="{{asset('admin/assets/images/logo.png')}}" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/animate-css/vivify.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/c3/c3.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/dropify/css/dropify.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/site.min.css')}}">

    @yield('custom-css')
</head>

<body class="theme-cyan light_version font-shabnam rtl">

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

<!-- Theme Setting -->
<div class="themesetting">
    <a href="javascript:void(0);" class="theme_btn"><i class="icon-magic-wand"></i></a>
    <div class="card theme_color">
        <div class="header">
            <h2>رنگ قالب</h2>
        </div>
        <ul class="choose-skin list-unstyled mb-0">
            <li data-theme="green">
                <div class="green"></div>
            </li>
            <li data-theme="orange">
                <div class="orange"></div>
            </li>
            <li data-theme="blush">
                <div class="blush"></div>
            </li>
            <li data-theme="cyan" class="active">
                <div class="cyan"></div>
            </li>
            <li data-theme="indigo">
                <div class="indigo"></div>
            </li>
            <li data-theme="red">
                <div class="red"></div>
            </li>
        </ul>
    </div>
    <div class="card font_setting">
        <div class="header">
            <h2>تنظیمات فونت</h2>
        </div>
        <div>
            <div class="fancy-radio mb-2">
                <label>
                    <input name="font" value="font-yekan" type="radio">
                    <span>
                        <i></i>
                        فونت یکان
                    </span>
                </label>
            </div>
            <div class="fancy-radio mb-2">
                <label>
                    <input name="font" value="font-iransans" type="radio">
                    <span>
                        <i></i>
                        فونت ایران سنس
                    </span>
                </label>
            </div>
            <div class="fancy-radio">
                <label>
                    <input name="font" value="font-shabnam" type="radio"
                              checked="checked">
                    <span>
                        <i></i>
                        فونت شبنم
                    </span>
                </label>
            </div>
        </div>
    </div>
    <div class="card setting_switch">
        <div class="header">
            <h2>تنظیمات</h2>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                نسخه روشن
                <div class="float-right">
                    <label class="switch">
                        <input type="checkbox" class="lv-btn" checked="checked">
                        <span class="slider round"></span>
                    </label>
                </div>
            </li>
            <li class="list-group-item">
                نوارکناری مینی
                <div class="float-right">
                    <label class="switch">
                        <input type="checkbox" class="mini-sidebar-btn">
                        <span class="slider round"></span>
                    </label>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">
    <nav class="navbar top-navbar">
        <div class="container-fluid">
            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="{{route('admin.dashboard')}}">
                        <img src="{{asset('admin/assets/images/logo.png')}}" alt="پنل مدیریت" class="img-fluid logo">
                    </a>
                    <button type="button" class="btn-toggle-offcanvas">
                        <i class="lnr lnr-menu fa fa-bars"></i>
                    </button>
                </div>

                <ul class="nav navbar-nav">

                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-envelope"></i>
                            <span class="notification-dot bg-green">1</span>
                        </a>

                        <ul class="dropdown-menu right_chat email vivify fadeIn">
                            <li class="header green">شما 1 ایمیل جدید دارید</li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                        <div class="media-body">
                                            <span class="name">نام و نام خانوادگی
                                                <small class="float-right text-muted">همین حالا</small>
                                            </span>
                                            <span class="message">بروزرسانی گیتهاب</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="notification-dot bg-azura">1</span>
                        </a>
                        <ul class="dropdown-menu feeds_widget vivify fadeIn">
                            <li class="header blue">شما 1 اطلاعیه جدید دارید</li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left bg-red"><i class="fa fa-check"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-danger">
                                            شماره ثابت
                                            <small class="float-right text-muted">
                                                9:10 صبح
                                            </small>
                                        </h4>
                                        <small>ما همه اشکال طراحی با پاسخگو را رفع کرده ایم</small>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <i id="top_open_setting" class="icon-magic-wand"></i>
                    </li>

                    <li>
                        <a href="{{route('admin.profile')}}" class="megamenu_toggle icon-menu">
                            پروفایل من
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
    </nav>

    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="{{route('admin.dashboard')}}">
                <img src="{{asset('admin/assets/images/logo.png')}}" alt="پنل مدیریت" class="img-fluid logo">
                <span>پنل مدیریت</span>
            </a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i
                    class="lnr lnr-menu icon-close"></i></button>
        </div>

        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="{{$user_info['profile']}}" class="user-photo">
                </div>
                <div class="dropdown">
                    <span>خوش آمدید،</span>

                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                        <strong>
                            {{$user_info['first_name'] . " " . $user_info['last_name']}}
                        </strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li>
                            <a href="{{route('admin.profile')}}">
                                <i class="icon-user"></i>
                                پروفایل من
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.profile')}}">
                                <i class="icon-lock"></i>
                                تغییر رمز
                            </a>
                        </li>

                        <li>
                            <form method="post" action="{{route('logout')}}">
                                @csrf
                                <button type="submit">
                                    <i class="icon-power"></i>
                                    خروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="header">اصلی</li>

                    <li>
                        <a target="_blank" href="{{route('home')}}">
                            <i class="icon-globe-alt"></i>
                            <span>برو به سایت</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="icon-speedometer"></i>
                            <span>داشبورد</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.album_panel')}}">
                            <i class="fa fa-list"></i>
                            <span>آلبوم ها</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-arrow">
                            <i class="icon-book-open"></i>
                            <span>مقالات</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('admin.post_category.index')}}">دسته بندی ها</a>
                            </li>
                            <li>
                                <a href="{{route('admin.posts.create')}}">افزودن مقاله جدید</a>
                            </li>
                            <li>
                                <a href="{{route('admin.posts.index')}}">لیست مقالات</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow">
                            <i class="icon-settings"></i>
                            <span>تنظیمات سایت</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('admin.about_us_panel')}}">
                                    درباره ما
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.contact_us_panel')}}">
                                    تماس با ما
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('admin.message_panel')}}">
                            <i class="fa fa-list-alt"></i>
                            <span>پیغام های کاربران</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.users')}}">
                            <i class="icon-users"></i>
                            <span>مدیریت کاربران</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <form method="post" action="{{route('logout')}}">
                                @csrf
                                <button type="submit" class="p-0 text-danger">
                                    <i class="icon-power"></i>
                                    خروج
                                </button>
                            </form>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div id="main-content">
        @yield('content')
    </div>
</div>

<!-- Javascript -->
<script src="{{asset('admin/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('admin/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/vendor/dropify/js/dropify.js')}}"></script>
@include('sweetalert::alert')
@yield('custom-js')
</body>

</html>
