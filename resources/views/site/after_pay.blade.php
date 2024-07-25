@extends('layouts.site_layout')

@section('title')
    روشی نو | نتیجه پرداخت
@endsection

@section('custom-css')
    <style>
        .event_title {
            font-size: 12pt;
            font-weight: bold;
            display: inline-block;
            padding: 0 7px;
        }

        #countDown {
            font-weight: bold;
            font-size: 12pt;
            display: inline-block;
            padding: 0 7px;
        }
    </style>
@endsection

@section('custom-js')
    <script>
        let countDown = $("#countDown");
        let number = 10;
        setInterval(() => {
            number = parseInt(countDown.text());
            if (number > 1) {
                number--;
                countDown.text(number);
            } else {
                window.location.href = '/';
            }
        }, 1000)
    </script>
@endsection

@section('content')
    <!-- Start Page Title Area -->
    <div class="banner-area about">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>تماس با ما</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <p class="active"> تماس با ما</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    <div class="contact-service">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if($order['payment_status'] == 1)
                        <div class="alert alert-success text-center">
                            پرداخت باموفقیت انجام شد. ثبت نام شما در رویداد <span
                                class="event_title">{{$event['event_title']}}</span> انجام شد.
                            <span id="countDown">10</span>
                        </div>
                    @endif

                    @if($order['payment_status'] == 0)
                        <div class="alert alert-danger text-center">
                            پرداخت شما ناموفق بود.
                            <span id="countDown">10</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


