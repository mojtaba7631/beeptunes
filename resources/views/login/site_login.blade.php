@extends('layouts.site_layout')

@section('Title')
    ورود
@endsection

@section('custom-css')
    <style>
        #my_fullscreen_loader {
            width: 100%;
            height: 100%;
            position: fixed;
            right: 0;
            top: 0;
            background: rgba(0, 0, 0, .7);
            z-index: 99999999;
            display: none;
        }

        #my_fullscreen_loader img {
            width: 150px;
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            left: 0;
            margin: auto;
        }
        .address_box label {
            color: #000;
            font-weight: bold;
            font-size: 12pt;
        }

        .address_box p {
            color: #000;
            font-size: 10pt;
            line-height: 30px;
        }

        #addressModal .modal-title {
            font-size: 12pt;
        }

        #addressModal label {
            font-size: 11pt;
            font-weight: bold;
            margin-bottom: 7px;
            color: #555;
        }

        .my_error_danger i {
            font-size: 23pt;
            float: right;
        }

        .my_error_danger p {
            font-size: 10pt;
            color: #000;
            float: right;
            margin-right: 10px;
            margin-top: 6px;
            margin-bottom: 0;
        }

        @media (max-width: 766px) {
            .address_box label {
                font-size: 10pt;
            }
        }
    </style>
@endsection

@section('custom-js')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script>
        let my_fullscreen_loader = $("#my_fullscreen_loader");


        function show_sweetalert_msg(msg, icon) {
            new swal({
                html: "<p class='my_toast_txt'>" + msg + "</p>",
                toast: true,
                icon: icon,
                showConfirmButton: false,
                position: 'top',
                timerProgressBar: true,
                timer: 3500
            });
        }



    </script>
@endsection

@section('content')
    <div id="my_fullscreen_loader">
        <img src="{{asset('site/assets/img/my_circular_loader.svg')}}">
    </div>
    <!-- Start Page Title Area -->
    <div class="banner-area class-details">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>ورود</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <a href="#">ورود</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- SignUp -->
    <section class="signup-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="signup-form">
                        <h2>خوش آمدید!</h2>
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="نام کاربری">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="رمز عبور">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <a href="#" class="box-btn">
                                        ورود
                                    </a>
                                </div>
                                <span class="already">
                                    کاربر جدید ادوی!
                                    <a href="{{route('consultant_register')}}">
                                        عضویت
                                    </a>
                                </span>
                            </div>

                        </form>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="sign-up-img">
                        <img src="{{asset('site/assets/images/login.png')}}" alt="singup">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End SignUp -->
@endsection

