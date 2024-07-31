@extends('layouts.site_layout')

@section('title')
    پژواک نیزوا | ثبت نام
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/css/persianDatePicker.css')}}">
    <style>
        .mr-10 {
            margin-right: 10px !important;
        }

        input::placeholder {
            color: #aaa !important;
        }

        .register_step_2 {
            display: none;
        }

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

        .otp_code_inp {
            text-align: center;
            letter-spacing: 25px;
            font-size: 12pt !important;
            font-weight: bold !important;
        }
    </style>
@endsection

@section('custom-js')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script>

        let my_fullscreen_loader = $("#my_fullscreen_loader");

        let register_step_1 = $(".register_step_1");
        let register_step_2 = $(".register_step_2");
        let register_first_name = $("#register_first_name");
        let register_last_name = $("#register_last_name");
        let register_mobile = $("#register_mobile");
        let register_agree_code = $("#register_agree_code");

        //sweetalert
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

        function checkRegisterValidation() {
            if (!register_first_name.val()) {
                show_sweetalert_msg('نام الزامی است', 'error');
                return false;
            }
            if (!register_last_name.val()) {
                show_sweetalert_msg('نام خانوادگی الزامی است', 'error');
                return false;
            }
            if (!register_mobile.val()) {
                show_sweetalert_msg('تلفن همراه الزامی است', 'error');
                return false;
            } else if (register_mobile.val().length !== 11) {
                show_sweetalert_msg('تلفن همراه معتبر نیست', 'error');
                return false;
            } else if (register_mobile.val().substring(0, 2) !== '09') {
                show_sweetalert_msg('تلفن همراه معتبر نیست', 'error');
                return false;
            }

            return true;

        }

        function sendRegisterConfirmCode() {
            if (!checkRegisterValidation()) {
                return false;
            }
            my_fullscreen_loader.slideUp();

            let data = {
                first_name: register_first_name.val().toString(),
                last_name: register_last_name.val().toString(),
                mobile: register_mobile.val().toString(),
            };
            $.ajax({
                url: '{{route("api.send_register_confirm_code")}}',
                type: 'post',
                contentType: 'application/json',
                data: JSON.stringify(data),
                headers: {
                    "Accept": "application/json"
                },
                success: function (response) {
                    if (response.error) {
                        show_sweetalert_msg(response.message, 'error');
                        my_fullscreen_loader.slideUp();
                        return false;
                    } else {
                        show_sweetalert_msg(response.message, 'success');
                        my_fullscreen_loader.slideUp();
                        showRegisterStepTwo();
                    }
                },
                error: function (xhr, status, error) {
                    show_sweetalert_msg('dsfs', 'error');
                    setTimeout(() => {
                        //loacation.reload();
                    }, 2000);
                }
            });
        }

        function showRegisterStepTwo() {
            register_step_1.slideUp();

            $.ajax({
                url: '{{route("site.doRegisterConfirmCode")}}',
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify(data),
                headers: {
                    "Accept": "application/json"
                },

                success: function (response) {
                    if (response.error) {
                        show_sweetalert_msg(response.message, 'error');
                        my_fullscreen_loader.slideUp();
                        return false;
                    } else {
                        show_sweetalert_msg(response.message, 'success');
                        setTimeout(() => {
                            window.location.href = "{{route('home')}}";
                        }, 1500);
                    }
                },
                error: function (xhr, status, error) {
                    show_sweetalert_msg('خطای سمت سرور رخ داده است، لطفا اندکی بعد تلاش کنید', 'error');
                    setTimeout(() => {
                        location.reload();
                    }, 3500);
                }
            });

            // setTimeout(() => {
            //     register_step_2.slideDown();
            // }, 500);
        }

        function doRegister() {
            my_fullscreen_loader.slideDown();

            let data = {
                confirm_code: register_agree_code.val().toString(),
                mobile: register_mobile.val().toString(),
                _token: '{{csrf_token()}}'
            };

            $.ajax({
                url: '{{route("site.doRegister")}}',
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify(data),
                headers: {
                    "Accept": "application/json"
                },

                success: function (response) {
                    if (response.error) {
                        show_sweetalert_msg(response.message, 'error');
                        my_fullscreen_loader.slideUp();
                        return false;
                    } else {
                        show_sweetalert_msg(response.message, 'success');
                        setTimeout(() => {
                            window.location.href = "{{route('home')}}";
                        }, 1500);
                    }
                },
                error: function (xhr, status, error) {
                    show_sweetalert_msg('خطای سمت سرور رخ داده است، لطفا اندکی بعد تلاش کنید', 'error');
                    setTimeout(() => {
                        location.reload();
                    }, 3500);
                }
            });
        }
    </script>
@endsection

@section('content')
    <div id="my_fullscreen_loader">
        <img src="{{asset('site/assets/images/my_loader.svg')}}">
    </div>

    <!-- Start Page Title Area -->
    <div class="banner-area about">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>ثبت نام</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <p class="active">ثبت نام</p>
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
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-6">

                    <div class="signup-form">
                        <div class="text-center">
                            <img src="{{asset('site/assets/images/logo.png')}}" alt="ثبت نام در پژواک نیزوا">
                        </div>

                        <h2 class="text-center">
                            ثبت نام در نیزوا
                        </h2>
                        <div class="row">
                            <div class="col-12 register_step_1">
                                <div class="form-group">
                                    <label class="small mr-10 mb-2">نام</label>
                                    @error('first_name')
                                    <span class="validation_label_error">{{$message}}</span>
                                    @enderror
                                    <input type="text" class="form-control" name="first_name"
                                           id="register_first_name">
                                </div>
                            </div>

                            <div class="col-12 register_step_1">
                                <div class="form-group">
                                    <label class="small mr-10 mb-2">نام خانوادگی</label>
                                    @error('last_name')
                                    <span class="validation_label_error">{{$message}}</span>
                                    @enderror
                                    <input type="text" class="form-control" name="last_name" id="register_last_name">
                                </div>
                            </div>

                            <div class="col-12 register_step_1">
                                <div class="form-group">
                                    <label class="small mr-10 mb-2">تلفن همراه</label>
                                    @error('mobile')
                                    <span class="validation_label_error">{{$message}}</span>
                                    @enderror
                                    <input type="text" class="form-control text-right" name="mobile"
                                           id="register_mobile"
                                           placeholder="09..." style="direction: ltr">
                                </div>
                            </div>

                            <div class="col-12 register_step_2">
                                <div class="form-group">
                                    <label class="small mr-10 mb-2">کد تایید</label>
                                    @error('agree_code')
                                    <span class="validation_label_error">{{$message}}</span>
                                    @enderror
                                    <input type="text" class="form-control text-center otp_code_inp" name="agree_code"
                                           id="register_agree_code">
                                </div>
                            </div>
                        </div>

                        <div class="row register_step_1" dir="ltr">
                            <div class="col-12">
                                <button type="button" onclick="sendRegisterConfirmCode()" class="box-btn w-100">
                                    دریافت کد تایید
                                </button>
                            </div>
                        </div>

                        <div class="row register_step_2" dir="ltr">
                            <div class="col-12">
                                <button onclick="doRegister()" type="submit" class="box-btn w-100">
                                    ثبت نام
                                </button>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                قبلا عضو شده اید؟
                                <a href="{{route('user.login')}}">
                                    وارد شوید
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 col-xl-6">
                    <div class="sign-up-img">
                        <img class="mw-100" src="{{asset('site/assets/images/login.png')}}" alt="ورود به حساب کاربری نیزوا">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End SignUp -->
@endsection
