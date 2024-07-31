@extends('layouts.site_layout')
@section('title')
    مقالات
@endsection
@section('content')
    <!-- Start Page Title Area -->
    <div class="banner-area news-bg">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>مقالات</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <p class="active"> مقاله </p>
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
                @if(!empty($posts->all()))
                    @php
                        $row = (($posts->currentPage() - 1) * $posts->perPage() ) + 1;
                    @endphp
                    @foreach($posts as $post)
                        <div class="col-12 col-lg-3 col-md-6">
                            <div class="single-news">
                                <div class="news-img">
                                    <a href="{{route('post_detail',['post_id' => $post['id']])}}">
                                        <img src="{{asset($post['post_image'])}}" alt="events" />
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="{{route('post_detail',['post_id' => $post['id']])}}">
                                        <h2>
                                            {{$post['post_title']}}
                                        </h2>

                                        <p class="calender">
                                            <i class="flaticon-calendar"></i>
                                            تاریخ: {{verta($post['updated_at'])->format('d %B Y')}}
                                        </p>

                                        <p class="text-truncate mw-100">
                                            {{$post['post_meta_description']}}
                                        </p>

                                        <a href="{{route('post_detail',['post_nickname' => $post['post_nickname']])}}" class="line-bnt">
                                            ادامه خواندن
                                            <i class="flaticon-left-arrow"></i>
                                        </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        {{$posts->links()}}
                    </div>
                @else
                    <p class="alert alert-info">
                        هنوز مقاله ای ثبت نگردیده است.
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
