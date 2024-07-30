<!doctype html>
<html lang="en" dir="rtl">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="keywords" content="HTML5,CSS3,HTML,Template,multi-page,Edvi - Education HTML Template">
    <meta name="description" content="Edvi - Education HTML Template">
    <meta name="author" content="Barat Hadian">

    <link rel="icon" href="{{asset('site/assets/images/logo1.png')}}" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/bootstrap.rtl.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('site/assets/css/meanmenu.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/fontawesome-all.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/flaticon.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/magnific-popup.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/animate.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/rtl.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/dropify.min.css')}}">

    @yield('custom-css')
    <style>
        .cart_css {
            background: #9d1c1c;
            color: #ffffff;
            padding: 10px;
            border-radius: 50%;
            display: block;
            position: absolute;
            text-align: center;
            top: 2px;
            left: 5px;
            line-height: 50%;
            font-size: 12px;

        }
    </style>
</head>

<body>
<!-- Preloader -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
        </div>
    </div>
</div>
<!-- End Preloader -->

<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="mobile-nav">
        <a href="#" class="logo">
            <img src="{{asset('site/assets/images/logo1.png')}}" alt="logo"/>
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset('site/assets/images/logo1.png')}}" alt="logo"/>
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav text-right">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link active">خانه</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('posts_page')}}" class="nav-link">کتاب صوتی</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('albums')}}" class="nav-link">آلبوم ها</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('about_us')}}" class="nav-link">درباره ما</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact_us')}}" class="nav-link">
                                تماس با ما
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.login')}}" class="nav-link">ورود</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('consultant_register')}}" class="nav-link">
                                ثبت نام
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('cart')}}" class="nav-link">
                                سبد خرید
                                <i class="fa fa-shopping-basket"></i>
                                <span id="cart_count_span">{{$cart_count}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
@yield('content')

<!-- Footer Area -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-left">
                    <a href="index.html" class="logo">
                        <img src="{{asset('site/assets/images/logo2.png')}}" alt="logo"/>
                    </a>
                    <p>
                        لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است.
                    </p>
                    <ul class="footer-social">
                        <li>
                            <a href="#"><i class="flaticon-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-envelope"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-google-plus"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-content fml-25">
                    <h2>مدرسه</h2>
                    <ul>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> پشتیبانی</a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> حرفه</a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> مربیان</a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> کارمندان</a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> تماس با ما</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-content fml-15">
                    <h2>لینکهای سریع</h2>
                    <ul>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> صفحه اصلی</a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> کلاس ها</a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> دوره ها</a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> شرکت ما</a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> سوالات متداول</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-content fml-15 fml-20">
                    <h2>تماس بگیرید</h2>
                    <ul>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> تلفن: 12345678-021</a>
                        </li>
                        <li>
                            <a href="#"><i class="flaticon-left-arrow"></i> فکس: 12345678-021</a>
                        </li>
                        <li>
                            <a href="#">hello@edvi.com <i class="flaticon-left-arrow"></i></a>
                        </li>
                        <li>
                            <a href="#">support@edvi.com <i class="flaticon-left-arrow"></i></a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="flaticon-left-arrow"></i> ایران ، استان تهران ، میدان آزادی
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer Area -->

<!-- Javascript -->
<script src="{{asset('site/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('site/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.meanmenu.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('site/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/assets/js/wow.min.js')}}"></script>
<script src="{{asset('site/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('site/assets/js/form-validator.min.js')}}"></script>
<script src="{{asset('site/assets/js/contact-form-script.js')}}"></script>
<script src="{{asset('site/assets/js/main.js')}}"></script>
<script src="{{asset('site/assets/js/dropify.js')}}"></script>

@include('sweetalert::alert')
@yield('custom-js')
</body>

</html>
