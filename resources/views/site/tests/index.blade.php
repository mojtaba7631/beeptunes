@extends('layouts.site_layout')
@section('title')
    آزمون ها
@endsection
@section('content')
    <!-- Start Page Title Area -->
    <div class="banner-area news-bg">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>آزمون ها</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <p class="active"> آزمون ها </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- News -->

    <section class="news">
        <div class="container">
            <div class="row">
                @if(!empty($test_info->all()))
                    @php
                        $row = (($test_info->currentPage() - 1) * $test_info->perPage() ) + 1;
                    @endphp
                    @foreach($test_info as $test)
                        <div class="col-12 col-lg-3 col-md-6">
                            <div class="single-news">
                                <div class="news-img">
                                    <a href="{{route('five_factor_test',['test_id' => $test['id']])}}">
                                        <img src="{{asset($test['test_image'])}}" alt="tests" />
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="{{route('five_factor_test',['test_id' => $test['id']])}}">
                                        <h2>
                                            {{$test['test_name']}}
                                        </h2>
                                        <p class="calender">
                                            <i class="flaticon-calendar"></i>
                                            تاریخ: 10 دی 1398
                                        </p>
                                        <p>
                                            {{$test['test_meta_description']}}
                                        </p>
                                        <a href="{{route('test_detail',['test_id' => $test['id']])}}" class="line-bnt">
                                            ادامه خواندن
                                            <i class="flaticon-left-arrow"></i>
                                        </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        {{$test_info->links()}}
                    </div>
                @else
                    <p class="alert alert-info">
                        هنوز آزمونی ثبت نگردیده است.
                    </p>
                @endif
            </div>

{{--            <div class="row">--}}
{{--                <div class="col-lg-12 text-center">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item"><a class="page-link" href="#"><i class="flaticon-next"></i></a></li>--}}
{{--                        <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#"><i class="flaticon-left-arrow"></i></a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

    </section>
    <!-- End News  -->
@endsection
