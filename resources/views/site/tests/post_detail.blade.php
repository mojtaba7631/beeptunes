@extends('layouts.site_layout')
@section('title')
    سوالات آزمون {{$test_info['test_name']}}
@endsection
@section('custom-css')
    <style>
        .post_image img{
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <!-- Start Page Title Area -->
    <div class="banner-area news-details">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>
                            {{$test_info['test_name']}}
                        </h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <p class="active">
                                    جزئیات مقاله
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    <!-- News Details -->
    <section class="single-news-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9">
                        <div class="single-slider">
                            <div class="post_image">
                                <img src="{{asset($test_info['test_image'])}}" alt="news" />
                            </div>
                            <div class="content mt-2">
                                <h2>
                                    {{$test_info['post_title']}}
                                </h2>
                                <p>
                                    {!! $test_info['post_content'] !!}
                                </p>
                            </div>
                        </div>
                    <div class="share">
                        <ul class="share-list">
                            <li>
                                <p class="share-p">اشتراک</p>
                            </li>
                            <li>
                                <a href=""><i class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="flaticon-twitter"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="flaticon-envelope"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="flaticon-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>


                </div>

                <div class="col-12 col-md-3">
                    <div class="news-content-right">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control about-search" placeholder="جستجو ..." />
                            </div>
                            <button type="submit"> <i class="flaticon-search"></i></button>
                        </form>



                    </div>
                </div>
                <div class="col-12">
                    <div class="consultation-area">
                        <h2>لطفا به سوالات زیر پاسخ دهید</h2>
                        <form class="form-group">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <input type="text" class="form-control" placeholder="نام و نام خانوادگی" />
                                </div>
                                <div class="col-12 mt-2">
                                    <input type="email" class="form-control" placeholder="آدرس ایمیل" />
                                </div>
                                <div class="col-12 mt-2">
                                    <input type="text" class="form-control" placeholder="تلفن" />
                                </div>
                                <div class="col-12 mt-2">
                                    <textarea placeholder="پیام شما ..." class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                        <a href="#" class="btn btn-success mt-2">ارسال</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End News Area -->
@endsection
