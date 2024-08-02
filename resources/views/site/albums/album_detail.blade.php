@extends('layouts.site_layout')
@section('title')
    بیپ تونز | آلبوم فلان
@endsection

@section('custom-css')
    <style>
        .single-class-area {
            background: #f1f1f1;
        }

        .album_box {
            border: 1px dashed #005f55;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 10pt;
            display: flex;
            cursor: default;
            font-weight: bold;
        }

        .track_img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .name_track {
            border: #0a53be solid 1px;
            border-radius: 5px;
            font-size: 10px;
            padding: 3px 6px;
            margin-left: 5px;
        }

        .time_track {
            border: #6a1a21 solid 1px;
            border-radius: 5px;
            font-size: 10px;
            padding: 3px 6px;
        }

        .audio_css {
            height: 45px !important;
            width: 100%;
        }

        .cart_btn[disabled] {
            opacity: .5;
            filter: blur(4px);
        }

        .album_box_content, .album_box_sidebar {
            background: #fff;
            padding: 50px 30px;
            border-radius: 30px;
        }

        .album_box_content .album_image {
            border-radius: 30px;
            width: 100%;
            object-fit: cover;
        }

        .album_box_content .album_description {
            border: 1px dashed #005f55;
            padding: 30px;
            border-radius: 15px;
        }

        .album_box_content .album_title {
            border: 1px dashed rgba(0, 95, 85, 0.3);
            color: #005f55;
            font-weight: bold;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 15px;
            font-size: 18pt;
        }

        .album_box_sidebar .sidebar_title {
            border: 1px dashed #005f55;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 15px;
            font-size: 14pt;
        }

        .album_box_sidebar .track_title {
            font-size: 10pt;
            font-weight: bold;
        }

        .album_box_sidebar .each_track {
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 0 5px rgba(0, 0, 0, .2);
            margin: 15px 0;
        }

        .my_title {
            line-height: 50px;
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

            let cart_cookie = getCookie('cart');

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
                        }, 2000);
                    } else {
                        show_sweetalert_msg(response.message, 'success');
                        $(tag).prop('disabled', false);
                        $("#cart_count_span").text(response.cart_count)
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
            let cookieName = name + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let cookieArray = decodedCookie.split(';');

            for (let i = 0; i < cookieArray.length; i++) {
                let cookie = cookieArray[i];
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
                <div class="col-12 col-md-8 text-center">
                    <div class="album_box_content">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 col-xl-6">
                                <img class="album_image" src="{{asset($album_info['album_image'])}}"
                                     alt="پژواک نیزوا | {{$album_info['album_title']}}"/>
                            </div>

                            <div class="col-12 mt-4">
                                <h2 class="album_title">
                                    {{$album_info['album_title']}}
                                </h2>

                                <div class="col-12 d-flex p-0 justify-content-between">
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

                            <div class="col-12 mt-3">
                                <div class="album_description text-justify">
                                    {!! $album_info['album_content'] !!}
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="class-btn">
                                    <button type="submit" onclick="addToCart(this)" class="box-btn cart_btn">
                                        <i class="fa fa-shopping-basket"></i>
                                        <span>افزودن به سبد خرید</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 text-center">
                    <div class="album_box_sidebar">
                        <h3 class="sidebar_title">ترک های آلبوم</h3>

                        <ul class="class-list m-0 p-0">
                            @foreach($tracks_album as $track)
                                <li class="w-100 each_track">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="row">
                                            <div class="col-12 col-md-3 text-center">
                                                <img src="{{asset($track['track_image'])}}" class="d-flex track_img m-auto">
                                            </div>
                                            <div class="col-12 col-md-6 text-center">
                                                <span class="track_title mb-0 my_title text-center m-auto">
                                                    {{$track['track_title']}}
                                                </span>
                                            </div>
                                            <div class="col-12 col-md-3 text-center">
                                                <span class="time_track my_title text-center">
                                                    {{$track['track_time']}}
                                                </span>
                                            </div>
                                            <div class="col-12 mt-3 text-center">
                                                <span class="name_track text-center">
                                                {{$album_info['album_title']}}
                                                </span>
                                            </div>

                                        </div>


                                        <h6 class="d-flex">


                                        </h6>
                                    </div>

                                    <audio controls class="audio_css mt-2">
                                        <source src="{{asset($track['track_file'])}}">
                                    </audio>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->
@endsection
