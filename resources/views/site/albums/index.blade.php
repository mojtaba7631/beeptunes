@extends('layouts.site_layout')
@section('title')
    بیپ تونز | آلبوم ها
@endsection
@section('custom-css')
    <style>
        .album_img{
            width: 100%;
            height: 300px;
        }
    </style>
@endsection
@section('custom-js')
@endsection
@section('content')
    <!-- Start Page Title Area -->
    <div class="banner-area about">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>آلبوم ها</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <p class="active">آلبوم ها</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Classes -->
    <section class="class-area">
        <div class="container">
            <div class="row">
               @foreach($albums_info as $albums)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="single-ragular-course">
                        <div class="course-img">
                            <img src="{{asset($albums['album_image'])}}" alt="music" class="album_img"/>
                            <h2>{{$albums['album_title']}}</h2>
                        </div>
                        <div class="course-content">
                            <p class="text-truncated h-100px">
                                {{$albums['album_meta_description']}}
                            </p>

                            <a href="{{route('album_detail',['album_id' => $albums['id']])}}" class="border-btn text-white">
                                ادامه خواندن
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    {{$albums_info->links()}}
                </div>
            </div>
        </div>
    </section>
    <!-- End Classes -->
@endsection
