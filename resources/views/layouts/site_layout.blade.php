<!doctype html>
<html lang="en" dir="rtl">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="keywords" content="HTML5,CSS3,HTML,Template,multi-page,Edvi - Education HTML Template">
    <meta name="description" content="Edvi - Education HTML Template">
    <meta name="author" content="Barat Hadian">

    <link rel="icon" href="{{asset('site/assets/images/favicon.png')}}" type="image/x-icon">
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

        .clear_btn {
            background: transparent;
            border: none;
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
        <a href="{{route('home')}}" class="logo">
            <img class="top_logo" src="{{asset('site/assets/images/logo.png')}}" alt="logo"/>
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img class="top_logo" src="{{asset('site/assets/images/logo.png')}}" alt="logo"/>
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav text-right">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">خانه</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('albums')}}" class="nav-link">آلبوم ها</a>

                        </li>

                        <li class="nav-item">
                            <a href="{{route('posts_page')}}" class="nav-link">مقالات</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('about_us')}}" class="nav-link">درباره ما</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('contact_us')}}" class="nav-link">
                                تماس با ما
                            </a>
                        </li>

                        @auth
                            <li class="nav-item">
                                <a href="{{route('home')}}" class="nav-link welcome_top">
                                    با
                                    {{auth()->user()->mobile}}
                                    وارد شدید
                                </a>
                            </li>

                            <li class="nav-item">
                                <form method="post" action="{{route('logout')}}" class="nav-link m-0 p-0">
                                    @csrf
                                    <button style="margin-top: -2px" class="clear_btn text-danger d-block">خروج</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{route('user.login')}}" class="nav-link">ورود</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('user_register')}}" class="nav-link">
                                    ثبت نام
                                </a>
                            </li>
                        @endauth

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
            <div class="col-12 col-md-6 col-lg-4">
                <div class="footer-left">
                    <a href="{{route('home')}}" class="logo">
                        <img class="footer_logo" src="{{asset('site/assets/images/logo.png')}}" alt="logo"/>
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

            <div class="col-12 col-md-6 col-lg-2">
                <div class="footer-content fml-15">
                    <h2>لینکهای سریع</h2>
                    <ul>
                        <li>
                            <a href="{{route('home')}}">
                                <i class="flaticon-left-arrow"></i>
                                صفحه اصلی
                            </a>
                        </li>

                        <li>
                            <a href="{{route('albums')}}">
                                <i class="flaticon-left-arrow"></i>
                                آلبوم ها
                            </a>
                        </li>

                        <li>
                            <a href="{{route('posts_page')}}">
                                <i class="flaticon-left-arrow"></i>
                                مقالات
                            </a>
                        </li>

                        <li>
                            <a href="{{route('contact_us')}}">
                                <i class="flaticon-left-arrow"></i>
                                تماس با ما
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="footer-content fml-15 fml-20">
                    <h2>با ما در تماس باشید</h2>
                    <ul>
                        <li>
                            <a href="tel:{{$contact_us_info_provider['phone1']}}">
                                <i class="flaticon-left-arrow"></i>
                                تلفن:
                                {{$contact_us_info_provider['phone1']}}
                            </a>
                        </li>

                        <li>
                            <a href="tel:{{$contact_us_info_provider['phone2']}}">
                                <i class="flaticon-left-arrow"></i>
                                تلفن:
                                {{$contact_us_info_provider['phone2']}}
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="flaticon-left-arrow"></i>
                                ساعت کاری:
                                {{$contact_us_info_provider['work_time']}}
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="flaticon-left-arrow"></i>
                                آدرس:
                                {{$contact_us_info_provider['address']}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-2">
                <div class="footer-content fml-15">
                    <h2>مجوزهای ما</h2>
                    <ul>
                        <li>
                            <img class="footer_logo w-100" src="{{asset('site/assets/images/enamad.png')}}">
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-12">
                <p class="copyright_footer">
                    © کلیه حقوق مادی و معنوی متعلق به پژواک نیزوا می باشد
                </p>
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
