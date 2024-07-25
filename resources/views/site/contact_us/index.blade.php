@extends('layouts.site_layout')
@section('title')
    روشی نو | تماس با ما
@endsection
@section('custom-css')
    <style>
        .my_about_img {
            width: 100%;
        }
    </style>
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
    <div class="shape-ellips-contact">
        <img src="assets/images/contact-shape.png" alt="shape"/>
    </div>

    <!-- Service area -->
    <div class="contact-service">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single-service text-center">
                        <div class="service-icon">
                            <i class="flaticon-clock"></i>
                        </div>
                        <div class="service-content">
                            <p>
                                {{$contact_us['work_time']}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single-service text-center">
                        <div class="service-icon">
                            <i class="flaticon-pin"></i>
                        </div>
                        <div class="service-content">
                            <p>
                                {{$contact_us['address']}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="single-service text-center sst-10">
                        <div class="service-icon">
                            <i class="flaticon-telephone"></i>
                        </div>
                        <div class="service-content">
                            <p>
                                {{$contact_us['phone1']}}
                            </p>
                            <p>
                                {{$contact_us['phone2']}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Service area -->

    <!-- Contact Area -->
    <section class="home-contact-area pb-100 pt-100">
        <div class="container-fluid">
            <form action="{{route('messages_store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row align-items-center">
                    <div class="col-lg-6 pr-0">
                        <div class="contact-img">
                            <img src="{{asset('site/assets/images/contact.png')}}" alt="contact"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="home-contact-content">
                            <h2>با ما تماس بگیرید</h2>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="message_name" id="message_name" class="form-control" required
                                                   data-error="نام خود را وارد کنید" placeholder="نام شما"/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="message_mobile" id="message_mobile" required
                                                   data-error="تلفن خود را وارد کنید" class="form-control"
                                                   placeholder="تلفن شما"/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" name="message_subject" id="message_subject" class="form-control"
                                                   required data-error="موضوع خود را وارد کنید"
                                                   placeholder="موضوع شما"/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message_description" class="form-control" id="message_description" cols="30"
                                                      rows="5" required data-error="پیام خود را بنویسید"
                                                      placeholder="پیام شما"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn page-btn box-btn">
                                            ارسال پیام
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Contact Area -->
@endsection
