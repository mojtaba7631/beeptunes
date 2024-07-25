@extends('layouts.site_layout')

@section('Title')
    تسویه حساب
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

        .checkout_title {
            font-size: 14pt;
            padding: 20px 0 30px 0;
        }

        .address_box {
            border: 2px dashed #344e87;
            padding: 15px;
            border-radius: 5px;
            background: #fbfbfb;
            cursor: pointer;
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

        .add_new_address {
            padding: 10px 15px;
            border: 3px solid #FD7E14FF;
            background: #FD7E14FF;
            color: #fff;
            font-size: 10pt;
            font-weight: bold;
            border-radius: 5px;
            float: left;
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

        .album_img {
            width: 60px;
        }

        .album_type_css {
            border: 1px solid #9d1c1c;
            padding: 2px 10px;
            font-size: 10px;
            border-radius: 4px;
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
        let address_box = $(".address_box");
        let shipping_price_left = $(".shipping_price_left");

        address_box.click(function () {
            let radio_inp = $(this).find('input[type=radio]');
            radio_inp.prop('checked', true);

            if (radio_inp.attr('name') === 'shipping_type') {
                my_fullscreen_loader.slideDown();
                let shipping_price = radio_inp.attr('data-price');
                shipping_price_left.text(putComma(shipping_price) + " تومان ");

                let data = {
                    _token: "{{csrf_token()}}",
                };

                $.ajax({
                    url: '/calculateFinalPrice/' + radio_inp.val().toString(),
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
                            $('.the_total_price').text(putComma(response.total_price) + ' تومان ');

                            my_fullscreen_loader.slideUp();
                        }
                    },
                    error: function (xhr, status, error) {
                        show_sweetalert_msg('خطای سمت سرور رخ داده است، لطفا اندکی بعد تلاش کنید', 'error');
                        setTimeout(() => {
                            // location.reload();
                        }, 2500);
                    }
                });
            }
        });

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

        function putComma(Number) {
            Number += '';
            Number = Number.replace(',', '');
            Number = Number.replace(',', '');
            Number = Number.replace(',', '');
            Number = Number.replace(',', '');
            Number = Number.replace(',', '');
            Number = Number.replace(',', '');
            x = Number.split('.');
            y = x[0];
            z = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(y))
                y = y.replace(rgx, '$1' + ',' + '$2');
            return y + z;
        }

        function removeComma(Number) {
            return Number.replace(/,/g, '');
        }

        function payment() {
            let selected_address = $("input[type=radio][name=address]:checked");
            if (!selected_address.length) {
                show_sweetalert_msg('انتخاب آدرس الزامی است', 'error');
                return false;
            }

            let selected_shipping = $("input[type=radio][name=shipping_type]:checked");
            if (!selected_shipping.length) {
                show_sweetalert_msg('انتخاب شیوه ارسال الزامی است', 'error');
                return false;
            }

            let data = {
                _token: "{{csrf_token()}}",
                address_id: selected_address.val().toString(),
                shipping_id: selected_shipping.val().toString(),
            };

            $.ajax({
                url: '/submitOrder',
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
                        show_sweetalert_msg(response.message, 'success');
                        setTimeout(() => {
                            location.href = response.link;
                        }, 1200);
                        my_fullscreen_loader.slideUp();
                    }
                },
                error: function (xhr, status, error) {
                    show_sweetalert_msg('خطای سمت سرور رخ داده است، لطفا اندکی بعد تلاش کنید', 'error');
                    setTimeout(() => {
                        // location.reload();
                    }, 2500);
                }
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
                        <h2>بررسی خرید</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <a href="#">بررسی خرید</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <section class="cart-area mt-4 ptb-100">
        <div class="container">
            @if(!empty($cart->all()))
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="checkout_title">فاکتور خرید</h4>
                                    </div>
                                </div>
                                <div class="cart-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">تصویر آلبوم</th>
                                            <th scope="col">نام آلبوم</th>
                                            <th scope="col">قیمت واحد</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @php $total_price = 0; @endphp
                                        @foreach($cart as $item)
                                            @php
                                                //                                                $company_name = $item->product->companies()->where('company_id', $item['company_id'])->first()->company_name;
                                                //                                                $price = $item->product->companies()->where('company_id', $item['company_id'])->first()->pivot->price;
                                                //                                                $inventory = $item->product->companies()->where('company_id', $item['company_id'])->first()->pivot->inventory;
                                                //                                                $total_price += $item['count'] * $price;
                                            @endphp
                                            <tr>
                                                <td class="album-thumbnail">
                                                    <a href="#">
                                                        <img src="{{asset($item['album_image'])}}" class="album_img">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="{{route('album_detail',['album_id' => $item['album_id']])}}">
                                                        <p>
                                                            {{$item['album_title']}}
                                                        </p>
                                                    </a>
                                                    <p>
                                                        <span class="album_type_css">
                                                        {{$item['album_type']}}
                                                        </span>
                                                    </p>
                                                </td>
                                                <td class="product-price">
                                                    <span class="unit-amount">
                                                        {{@number_format($item['album_price'])}}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        @if($phisical == 1)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="checkout_title clearfix">
                                                نشانی تحویل گیرنده

                                                <button data-bs-toggle="modal" data-bs-target="#addressModal"
                                                        class="add_new_address">
                                                    <i class="bx bx-plus ml-2"></i>
                                                    افزودن آدرس جدید
                                                </button>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @if(!empty($addresses->all()))
                                            <div class="col-12">
                                                @foreach($addresses as $address)
                                                    <div class="address_box mb-4">
                                                        <div class="w-100 clearfix">
                                                            <input value="{{$address['id']}}" class="float-right"
                                                                   type="radio" name="address">
                                                            <label class="float-right">
                                                                {{$address['address_title']}}
                                                            </label>
                                                        </div>

                                                        <p class="mb-0 w-100">
                                                            {{$address['address']}}
                                                        </p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <div class="alert alert-danger my_error_danger clearfix">
                                                    <i class="bx bx-error ml-2"></i>
                                                    <p>
                                                        آدرسی یافت نشد. افزودن حداقل یک آدرس و انتخاب آن الزامی می باشد.
                                                    </p>
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="card mt-3">
                            <div class="card-body">
                                <p class="alert alert-info">
                                    دقت بفرمایید آلبوم هایی که به صورت فیزیکی به شما تعلق میگیرد ، فایل دانلودی نیز دارد
                                    که پس از پرداخت در پنل کاربری خود به آنها دسترسی خواهید داشت.
                                </p>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-4 col-md-12">
                        <div class="cart-buttons mt-0 mb-4">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="shopping-coupon-code">
                                        <input type="text" class="form-control" placeholder="کد تخفیف"
                                               name="coupon-code"
                                               id="coupon-code">
                                        <button class="btn btn-primary mt-2" type="submit">بررسی کد</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cart-totals">
                            <h3>فاکتور نهایی</h3>
                            <ul>
                                <li>
                                    جمع فاکتور
                                    <span>{{@number_format($the_total_price)}} تومان</span>
                                </li>
                                {{--                                <li>--}}
                                {{--                                    هزینه ارسال--}}
                                {{--                                    <span class="shipping_price_left">شیوه ارسال انتخاب نشده است</span>--}}
                                {{--                                </li>--}}
                                <li>
                                    مبلغ قابل پرداخت
                                    <span
                                        class="the_total_price text-danger">{{@number_format($the_total_price)}} تومان</span>
                                </li>
                            </ul>
                            <button onclick="payment()" class="btn btn-success w-100 mb-2 mt-4">
                                پرداخت نهایی
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <p class="alert alert-danger mb-0">
                            سبد خرید شما خالی می باشد

                            <a class="btn btn-sm btn-warning mx-2 d-inline-block" href="{{route('products')}}">
                                <i class="flaticon-shopping-cart ml-2"></i>
                                برو به فروشگاه
                            </a>
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- The Modal -->
    <div class="modal fade" id="addressModal">
        <div class="modal-dialog">
            <form action="{{route('user.address_store')}}" method="post" class="modal-content">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">افزودن آدرس جدید</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label>عنوان آدرس</label>
                            <input required="required" name="address_title" type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-12 mt-4">
                            <label>آدرس</label>
                            <textarea required="required" rows="5" name="address" type="text"
                                      class="form-control form-control-sm"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="bx bx-plus ml-2"></i>
                        افزودن آدرس جدید
                    </button>
                    <button class="btn btn-danger btn-sm" data-bs-dismiss="modal">انصراف</button>
                </div>
            </form>
        </div>
    </div>
@endsection
