@extends('layouts.site_layout')
@section('title')
    بیپ تونز | سبد خرید
@endsection

@section('custom-css')
    <style>
        .single-class-area {
            background: #f1f1f1;
        }

        .cart_card {
            background: #fff;
            border-radius: 30px;
            padding: 50px 30px;
        }

        .album_img {
            width: 60px;
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

        .btn_trash {
            cursor: pointer;
        }

        .cart_card table > tbody > tr > td {
            vertical-align: middle;
            padding: 15px 5px;
        }

        .cart_card table > tbody > tr > td img {
            border-radius: 15px;
        }

        .total_price_in_cart {
            padding: 15px 15px 0 15px;
            margin: 15px 0 0 0;
            border-radius: 15px;
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

        function removeFromCart(tag, album_id) {
            my_fullscreen_loader.slideDown();

            let cart_cookie = getCookie('cart');

            if (cart_cookie === null) {
                location.reload();
            }

            let data = {
                album_id: album_id.toString(),
                cookie: cart_cookie.toString()
            };

            $.ajax({
                url: '{{route("api.remove_from_cart")}}',
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
                            // location.reload();
                        }, 2000);
                    } else {
                        my_fullscreen_loader.slideUp();
                        show_sweetalert_msg(response.message, 'success');

                        $('.the_total_price').text(response.the_total_price + ' تومان ');
                        $(tag).parents('tr').remove();
                        $("#cart_count_span").text(response.cart_count)

                        if (parseInt(response.cart_count )=== 0) {
                            location.reload()
                        }
                    }
                },
                error: function (xhr, status, error) {
                    show_sweetalert_msg('خطای سمت سرور رخ داده است، لطفا اندکی بعد تلاش کنید', 'error');
                    setTimeout(() => {
                        location.reload();
                    }, 2500);
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
    <div class="banner-area class-details">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>سبد خرید</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <a href="#">سبد خرید</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <section class="single-class-area">
        <div class="container">
            @if(!empty($cart->all()))
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart_card">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>محصول</th>
                                        <th>نام آلبوم</th>
                                        <th>نویسنده آلبوم</th>
                                        <th>قیمت واحد (تومان)</th>
                                        <th>حذف</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $row = (($cart->currentPage() - 1) * $cart->perPage() ) + 1;
                                    @endphp
                                    @foreach($cart as $item)
                                        <tr>
                                            <td class="w60">
                                                <span>{{$row}}</span>
                                            </td>
                                            <td>
                                                <img src="{{asset($item['album_image'])}}" class="album_img">
                                            </td>

                                            <td>
                                                <p class="mb-0">
                                                    {{$item['album_title']}}
                                                </p>
                                            </td>

                                            <td>
                                                <p class="mb-0">
                                                    {{$item['album_author']}}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="mb-0">
                                                    {{@number_format($item['album_price'])}}
                                                </p>
                                            </td>

                                            <td>
                                                <button onclick="removeFromCart(this , {{$item['album_id']}})"
                                                        class="btn btn-danger btn-sm btn_trash" data-toggle="tooltip"
                                                        title="حذف آلبوم">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            $row++;
                                        @endphp
                                    @endforeach

                                    <tr>
                                        <td colspan="4"></td>
                                        <
                                        <td class="fw-bold"> جمع کل</td>

                                        <td class="fw-bold  the_total_price">
                                            {{@number_format($the_total_price)}}
                                            تومان
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                {{$cart->links()}}
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="cart_card">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-center fw-bold">
                                        قیمت کل سبد خرید
                                    </h4>
                                </div>

                                <div class="col-12 d-flex justify-content-between total_price_in_cart">
                                    <span class="d-flex">جمع کل :</span>
                                    <span
                                        class="d-flex the_total_price">{{@number_format($the_total_price)}} تومان</span>
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="class-btn">
                                        <a href="{{route('checkout')}}" class="box-btn cart_btn w-100">
                                            <i class="fa fa-credit-card"></i>
                                            <span>تسویه حساب</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <p class="alert alert-danger mb-0">
                            <i class="fa fa-exclamation-triangle ml-2"></i>
                            سبد خرید شما خالی می باشد.
                            <a href="{{route('albums')}}" class="btn btn-sm btn-warning mr-4">
                                برو به آلبوم ها
                            </a>
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
