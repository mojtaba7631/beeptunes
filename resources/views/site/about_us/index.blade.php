@extends('layouts.site_layout')
@section('title')
    روشی نو | درباره ما
@endsection
@section('custom-css')
    <style>
        .my_about_img{
            width: 100%;
        }
        .user_img{
            height: 390px;
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
                        <h2>درباره ما</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}"> صفحه اصلی </a>
                                <i class="flaticon-left-arrow"></i>
                                <p class="active"> درباره ما</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

       <!-- About Area -->
       <section class="about-area">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="single-about">
                           <div>
                               <img src="{{asset($about_info['about_image'])}}" alt="about" class="my_about_img"/>
                           </div>

                           <div>
                               {!! $about_info['description'] !!}
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </section>
       <!-- End About Area -->

       <!-- Teachers Area -->
       <section class="home-teachers-area pt-30">
           <div class="container">
               <div class="section-tittle text-center">
                   <h2>
                       {{$about_info['about_title']}}
                   </h2>
                   <p>
                       {{$about_info['about_sub_title']}}
                   </p>
               </div>

               <div class="row">
                   <div class="col-lg-3 col-sm-6">
                       <div class="single-home-teacher">
                           <div class="teacher-img">
                               <a href="#">
                                   <img src="{{asset($about_info['about_first_user_image'])}}" alt="teacher" class="user_img"/></a>
                           </div>
                           <div class="teachers-content">
                               <h2>
                                   {{$about_info['about_first_user_name']}}
                               </h2>
                               <p>
                                   {{$about_info['about_first_user_education']}}
                               </p>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-3 col-sm-6">
                       <div class="single-home-teacher">
                           <div class="teacher-img">
                               <a href="#">
                                   <img src="{{asset($about_info['about_second_user_image'])}}" alt="teacher" class="user_img"/></a>
                           </div>
                           <div class="teachers-content">
                               <h2>
                                   {{$about_info['about_second_user_name']}}
                               </h2>
                               <p>
                                   {{$about_info['about_second_user_education']}}
                               </p>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-3 col-sm-6">
                       <div class="single-home-teacher">
                           <div class="teacher-img">
                               <a href="#">
                                   <img src="{{asset($about_info['about_third_user_image'])}}" alt="teacher" class="user_img"/>
                               </a>
                           </div>
                           <div class="teachers-content">
                               <h2>
                                   {{$about_info['about_third_user_name']}}
                               </h2>
                               <p>
                                   {{$about_info['about_third_user_education']}}
                               </p>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-3 col-sm-6">
                       <div class="single-home-teacher">
                           <div class="teacher-img">
                               <a href="#">
                                   <img src="{{asset($about_info['about_fourth_user_image'])}}" alt="teacher" class="user_img"/>
                               </a>
                           </div>
                           <div class="teachers-content">
                               <h2>
                                   {{$about_info['about_fourth_user_name']}}
                               </h2>
                               <p>
                                   {{$about_info['about_fourth_user_education']}}
                               </p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- End Teachers Area -->
@endsection
