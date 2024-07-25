@extends('layouts.site_layout')
@section('title')
    بیپ تونز | آلبوم فلان
@endsection
@section('custom-css')
    <style>
        .album_box {
            background: #01a263;
            color: #fff;
            padding: 10px;
            border-radius: 10px;
            margin-top: 5px;
            margin-bottom: 5px;
            margin-right: 12px;
            font-size: 10px;
            display: inline-block;
        }

        .track_img {
            width: 30px;
            height: 30px;
        }

        .name_track {
            border: #0a53be solid 1px;
            padding: 1px;
            border-radius: 5px;
            font-size: 10px;
            margin-left: 5px;
        }

        .time_track {
            border: #6a1a21 solid 1px;
            padding: 1px;
            border-radius: 5px;
            font-size: 10px;
            margin-right: 2px;
        }

        .audio_css {
            height: 30px !important;
        }

        .cart_btn[disabled] {
            opacity: .5;
            filter: blur(4px);
        }
    </style>
@endsection
@section('custom-js')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script>
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

        function addToCart(tag) {

            $(tag).prop('disabled', true);

            var cart_cookie = getCookie('cart');

            if (cart_cookie == null) {
                cart_cookie = new Date().getTime();
                setCookie('cart', cart_cookie.toString(), 60);
            }

            let data = {
                album_id: {{$album_info['id']}},
                cookie: cart_cookie.toString()
            };
            $.ajax({
                url: "{{route('api.add_to_cart')}}",
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                headers: {
                    "Accept": "application/json"
                },
                success: function (response) {
                    if (response.error) {
                        show_sweetalert_msg(response.message, 'error');
                        setTimeout(() => {
                            location.reload();
                        } , 2000) ;
                    } else {
                        show_sweetalert_msg(response.message, 'success');
                        $(tag).prop('disabled', false);
                        setTimeout(() => {
                            location.reload();
                        } , 1000) ;
                    }
                },
                error: function (xhr, status, error) {
                    show_sweetalert_msg('خطای سمت سرور رخ داده است ، لطفا دقایقی دیگر تلاش کنید ', 'error');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            })
        }

        function setCookie(name, value, days) {
            const expires = new Date(Date.now() + days * 24 * 60 * 60 * 1000);

            // Set the cookie with name, value, expires, and path (optional)
            document.cookie = `${name}=${value}; expires=${expires.toUTCString()}; path=/`;
        }

        function getCookie(name) {
            var cookieName = name + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var cookieArray = decodedCookie.split(';');

            for (var i = 0; i < cookieArray.length; i++) {
                var cookie = cookieArray[i];
                while (cookie.charAt(0) === ' ') {
                    cookie = cookie.substring(1);
                }
                if (cookie.indexOf(cookieName) === 0) {
                    return cookie.substring(cookieName.length, cookie.length);
                }
            }

            return null;
        }
    </script>
@endsection

@section('content')
    <!-- Start Page Title Area -->
    <div class="banner-area class-details">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>آلبوم {{$album_info['album_title']}}</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <a href="{{route('albums')}}">آلبوم ها</a>
                                <i class="flaticon-left-arrow"></i>
                                <p class="active">{{$album_info['album_title']}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Class Details -->
    <section class="single-class-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 text-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="class-img">
                                <img src="{{asset($album_info['album_image'])}}" alt="about"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <h2>{{$album_info['album_title']}}</h2>
                            {!! $album_info['album_content'] !!}
                        </div>
                        <div class="col-12">
                            <div class="album_box">
                                اثری از :
                                {{$album_info['album_author']}}
                            </div>
                            <div class="album_box">
                                دسته :
                                {{\App\Helper\GetCategoryTitle::get_category_title($album_info['category_album'])}}
                            </div>
                            <div class="album_box">
                                مجوز ارشاد :
                                {{$album_info['album_guidance_permit']}}
                            </div>
                            <div class="album_box">
                                کد کتابخانه ملی :
                                {{$album_info['album_national_library_code']}}
                            </div>
                            <div class="album_box">
                                تاریخ انتشار :
                                {{\App\Helper\ConvertDateToJalali::convert_date_to_jalali($album_info['created_at'])}}
                            </div>
                        </div>
                    </div>
                    <div class="single-class">


                        <div class="class-contnet">

                        </div>
                        <div>

                        </div>
                        <div class="class-btn">
                            <button type="submit" onclick="addToCart(this)" class="box-btn cart_btn">
                                افزودن به سبد خرید
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 text-center">
                    <div class="class-content-right">

                        <p class="visit">ترک های آلبوم</p>

                        <ul class="class-list">
                            <li>
                                <img src="{{asset($album_info['album_image'])}}" class="track_img">
                                <span>
                                    ترک اول
                                </span>
                                <p class="mt-1">
                                    <span class="name_track">
                                        یمین غفاری
                                    </span>
                                    <span class="time_track">
                                    3:46
                                </span>
                                </p>
                                <audio controls class="audio_css">
                                    <source src="#" type="audio/ogg">
                                    <source src="#" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>

                            </li>
                            <li>
                                <img src="{{asset($album_info['album_image'])}}" class="track_img">
                                <span>
                                    ترک دوم
                                </span>
                                <p class="mt-1">
                                    <span class="name_track">
                                        یمین غفاری
                                    </span>
                                    <span class="time_track">
                                    3:46
                                </span>
                                </p>
                                <audio controls class="audio_css">
                                    <source src="#" type="audio/ogg">
                                    <source src="#" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </li>
                            <li>
                                <img src="{{asset($album_info['album_image'])}}" class="track_img">
                                <span>
                                    ترک دوم
                                </span>
                                <p class="mt-1">
                                    <span class="name_track">
                                        یمین غفاری
                                    </span>
                                    <span class="time_track">
                                    3:46
                                </span>
                                </p>
                                <audio controls class="audio_css">
                                    <source src="#" type="audio/ogg">
                                    <source src="#" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </li>
                            <li>
                                <img src="{{asset($album_info['album_image'])}}" class="track_img">
                                <span>
                                    ترک دوم
                                </span>
                                <p class="mt-1">
                                    <span class="name_track">
                                        یمین غفاری
                                    </span>
                                    <span class="time_track">
                                    3:46
                                </span>
                                </p>
                                <audio controls class="audio_css">
                                    <source src="#" type="audio/ogg">
                                    <source src="#" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </li>
                            <li>
                                <img src="{{asset($album_info['album_image'])}}" class="track_img">
                                <span>
                                    ترک دوم
                                </span>
                                <p class="mt-1">
                                    <span class="name_track">
                                        یمین غفاری
                                    </span>
                                    <span class="time_track">
                                    3:46
                                </span>
                                </p>
                                <audio controls class="audio_css">
                                    <source src="#" type="audio/ogg">
                                    <source src="#" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </li>
                            <li>
                                <img src="{{asset($album_info['album_image'])}}" class="track_img">
                                <span>
                                    ترک اول
                                </span>
                                <p class="mt-1">
                                    <span class="name_track">
                                        یمین غفاری
                                    </span>
                                    <span class="time_track">
                                    3:46
                                </span>
                                </p>
                                <audio controls class="audio_css">
                                    <source src="#" type="audio/ogg">
                                    <source src="#" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>

                            </li>
                            <li>
                                <img src="{{asset($album_info['album_image'])}}" class="track_img">
                                <span>
                                    ترک دوم
                                </span>
                                <p class="mt-1">
                                    <span class="name_track">
                                        یمین غفاری
                                    </span>
                                    <span class="time_track">
                                    3:46
                                </span>
                                </p>
                                <audio controls class="audio_css">
                                    <source src="#" type="audio/ogg">
                                    <source src="#" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </li>
                            <li>
                                <img src="{{asset($album_info['album_image'])}}" class="track_img">
                                <span>
                                    ترک دوم
                                </span>
                                <p class="mt-1">
                                    <span class="name_track">
                                        یمین غفاری
                                    </span>
                                    <span class="time_track">
                                    3:46
                                </span>
                                </p>
                                <audio controls class="audio_css">
                                    <source src="#" type="audio/ogg">
                                    <source src="#" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </li>
                            <li>
                                <img src="{{asset($album_info['album_image'])}}" class="track_img">
                                <span>
                                    ترک دوم
                                </span>
                                <p class="mt-1">
                                    <span class="name_track">
                                        یمین غفاری
                                    </span>
                                    <span class="time_track">
                                    3:46
                                </span>
                                </p>
                                <audio controls class="audio_css">
                                    <source src="#" type="audio/ogg">
                                    <source src="#" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </li>
                            <li>
                                <img src="{{asset($album_info['album_image'])}}" class="track_img">
                                <span>
                                    ترک دوم
                                </span>
                                <p class="mt-1">
                                    <span class="name_track">
                                        یمین غفاری
                                    </span>
                                    <span class="time_track">
                                    3:46
                                </span>
                                </p>
                                <audio controls class="audio_css">
                                    <source src="#" type="audio/ogg">
                                    <source src="#" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->
@endsection
