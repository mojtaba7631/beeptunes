@extends('layouts.site_layout')
@section('title')
    بیپ تیونز
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('site/assets/css/my_count_down.css')}}">
    <style>
        .owl-carousel .owl-item img {
            width: 400px;
            height: 450px;
        }

        #my_count_down {
            /*position: absolute;*/
            right: 0;
            bottom: 10px;
            left: 0;
            margin: auto;
            text-align: center;
            z-index: 99999;
            max-height: 75px;
        }

        .events-img img {
            width: 100%;
        }

        .my_h {
            color: #000 !important;
        }

        .my_p {
            color: #000 !important;
            font-size: 13px;
        }

        .course-content h4 {
            color: #fff !important;
        }

        .home-special-course .single-home-special-course .course-img .course-content .box-btn {
            color: #fff !important;
        }

        a {
            cursor: pointer;
        }
    </style>
@endsection

@section('custom-js')
    <script src="{{asset('site/assets/js/my_count_down.js')}}"></script>

    <script>
        let labels = {
            d: "روز",
            h: "ساعت",
            m: "دقیقه",
            s: "ثانیه",
        }
        {{--startMyCountDown("{{$event_info['event_date_counter']}}", 'my_count_down', labels);--}}

        function show_event_register_modal() {
            var EventRegisterModal = $('#EventRegisterModal');
            EventRegisterModal.modal('show');
        }
    </script>
@endsection

@section('content')
    <!-- Slider area -->
    <section class="slider-area">
        <div class="home-slider owl-carousel owl-theme">
            <div class="single-slider single-slider-bg-1">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-center">
                                    <div class="slider-tittle one">
                                        {{--                                        <p style="font-size: 25px">--}}
                                        {{--                                            یک آهنگ زیبا باید قلبت را به اوج ببرد، روحت را گرم کند و احساس خوبی به تو ببخشد--}}
                                        {{--                                        </p>--}}

                                    </div>
                                    <div class="slider-btn bnt1 text-center">
                                        <a href="#" class="box-btn">هدیه بده</a>
                                        <a href="#" class="box-btn">مشاهده آلبوم ها</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider single-slider-bg-2">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-center">
                                    <div class="slider-tittle two">
                                        {{--                                        <h1>--}}
                                        {{--                                            ما بر رشد فرزندان <span>شما متمرکز می شویم</span>--}}
                                        {{--                                        </h1>--}}
                                        {{--                                        <p>--}}
                                        {{--                                            علاوه بر این مدارس اصلی ، دانش آموزان یک کشور خاص ممکن است در مدارس قبل و بعد از ابتدایی در دوره متوسطه و متوسطه نیز در آموزش ما شرکت کنند.--}}
                                        {{--                                        </p>--}}
                                    </div>
                                    <div class="slider-btn bnt2">
                                        <a href="#" class="box-btn">هدیه بده</a>
                                        <a href="#" class="border-btn">مشاهده آلبوم ها</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider single-slider-bg-3">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-center">
                                    <div class="slider-tittle two">
                                        {{--                                        <h1>--}}
                                        {{--                                            ما بر رشد فرزندان <span>شما متمرکز می شویم</span>--}}
                                        {{--                                        </h1>--}}
                                        {{--                                        <p>--}}
                                        {{--                                            علاوه بر این مدارس اصلی ، دانش آموزان یک کشور خاص ممکن است در مدارس قبل و بعد از ابتدایی در دوره متوسطه و متوسطه نیز در آموزش ما شرکت کنند.--}}
                                        {{--                                        </p>--}}
                                    </div>
                                    <div class="slider-btn bnt2">
                                        <a href="#" class="box-btn">هدیه بده</a>
                                        <a href="#" class="border-btn">مشاهده آلبوم ها</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Slider aera -->

    <!-- Service area -->
    {{--    <section class="service-area">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-4 col-sm-6 mb-2">--}}
    {{--                    <div class="single-service text-center">--}}
    {{--                        <div class="service-icon">--}}
    {{--                            <i class="flaticon-clock"></i>--}}
    {{--                        </div>--}}
    {{--                        <div class="service-content">--}}
    {{--                            <h2>مشاوره</h2>--}}
    {{--                            <p>همراه شما برای رسیدن به هدف</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-lg-4 col-sm-6 mb-2">--}}
    {{--                    <div class="single-service text-center">--}}
    {{--                        <div class="service-icon">--}}
    {{--                            <i class="fa fa-question"></i>--}}
    {{--                        </div>--}}
    {{--                        <div class="service-content">--}}
    {{--                            <h2>آموزش</h2>--}}
    {{--                            <p>تخصص می تواند بهترین راهنمای شما برای رسیدن به مقصد باشد</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-lg-4 col-sm-12 mb-2">--}}
    {{--                    <div class="single-service text-center sst-10">--}}
    {{--                        <div class="service-icon">--}}
    {{--                            <i class="fa fa-eye"></i>--}}
    {{--                        </div>--}}
    {{--                        <div class="service-content">--}}
    {{--                            <h2>نوآوری</h2>--}}
    {{--                            <p>همیشه به روز ، در اوج ، خلاق و موفق باشید</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- End Service area -->

    <div class="shape-ellips">
        <img src="{{asset('site/assets/images/shape.png')}}" alt="shape"/>
    </div>


    <!-- Special Course -->
    <section class="home-special-course mt-4">
        <div class="container-fluid">
            <div class="section-tittle text-center">
                <h2>آلبوم های ما</h2>
                <p>
                    ما سعی داریم تا با فراهم آوردن بهترین آلبوم های موسیقی سهمی هر چند کوچک در اعتلای فرهنگ این مرز و
                    بوم داشته باشیم.
                </p>
            </div>

            <div class="home-course-slider owl-carousel owl-theme">
                @foreach($albums_info as $album)
                    <div class="single-home-special-course">
                        <div class="course-img text-center">

                            <img src="{{asset($album['album_image'])}}" alt="course" class="m-auto w-100"/>

                            <div class="course-content">
                                <h4>{{$album['album_title']}}</h4>
                                <p>
                                    دروس نقاشی نوعی دستورالعمل رسمی در نواختن ساز موسیقی یا آواز خواندن است.
                                </p>
                                <a href="{{route('album_detail',['album_id' => $album])}}" class="box-btn">ادامه
                                    خواندن</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Special Course -->


    <section class="home-ragular-course pb-100 mt-4">
        <div class="container">
            <div class="section-tittle text-center">
                <h2>کتاب صوتی</h2>
                <p>
                    با استفاده از آزمون های روشی نو خود را بهتر بشناسید.
                </p>
            </div>

            <div class="row">
                <div class="home-course-slider owl-carousel owl-theme">
                    <div class="col-12">
                        <div class="single-events">
                            <div class="events-img">
                                <a href="#">
                                    <img src="{{asset('site/assets/images/img5.png')}}" alt="events"/>
                                </a>
                            </div>
                            <div class="content">
                                <a href="#">
                                    <h4 class="my_h">کتاب صوتی یک</h4>
                                    {{--                                    <p class="calender">--}}
                                    {{--                                        <i class="flaticon-calendar"></i> تاریخ: 10 دی 1398--}}
                                    {{--                                    </p>--}}
                                    <p class="my_p">
                                        این یک واقعیت طولانی است که یک خواننده از محتوای قابل خواندن یک صفحه پریشان می
                                        شود.
                                    </p>
                                    <a href="#" class="btn btn-secondary">
                                        مشاهده
                                    </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-events">
                            <div class="events-img">
                                <a href="#">
                                    <img src="{{asset('site/assets/images/img5.png')}}" alt="events"/>
                                </a>
                            </div>
                            <div class="content">
                                <a href="#">
                                    <h4 class="my_h">کتاب صوتی دو</h4>
                                    {{--                                    <p class="calender">--}}
                                    {{--                                        <i class="flaticon-calendar"></i> تاریخ: 10 دی 1398--}}
                                    {{--                                    </p>--}}
                                    <p class="my_p">
                                        این یک واقعیت طولانی است که یک خواننده از محتوای قابل خواندن یک صفحه پریشان می
                                        شود.
                                    </p>
                                    <a href="#" class="btn btn-secondary">
                                        مشاهده
                                    </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-events">
                            <div class="events-img">
                                <a href="#">
                                    <img src="{{asset('site/assets/images/img5.png')}}" alt="events"/>
                                </a>
                            </div>
                            <div class="content">
                                <a href="#">
                                    <h4 class="my_h">کتاب صوتی سه</h4>
                                    {{--                                    <p class="calender">--}}
                                    {{--                                        <i class="flaticon-calendar"></i> تاریخ: 10 دی 1398--}}
                                    {{--                                    </p>--}}
                                    <p class="my_p">
                                        این یک واقعیت طولانی است که یک خواننده از محتوای قابل خواندن یک صفحه پریشان می
                                        شود.
                                    </p>
                                    <a href="#" class="btn btn-secondary">
                                        مشاهده
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Regular Course area  -->

    <!-- Choose area  -->
    <section class="choose-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 pr-0">
                    <div class="home-choose-img">
                        <img src="{{asset('site/assets/images/choose1.png')}}" alt="choose"/>
                    </div>
                </div>

                <div class="col-lg-6 home-choose">
                    <div class="home-choose-content">
                        <div class="section-tittle">
                            <h2>جدیدترین آلبوم</h2>
                            <p>
                                آلبوم شور عشق جدیدترین آلبوم تهیه شده توسط گروه نوا می باشد
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-12 col-md-5">
                                <ul class="choose-list-left">
                                    <li><i class="flaticon-check-mark"></i>ترک اول</li>
                                    <li><i class="flaticon-check-mark"></i>ترک دوم</li>
                                    <li><i class="flaticon-check-mark"></i>ترک سوم</li>
                                    <li><i class="flaticon-check-mark"></i>ترک چهارم</li>
                                    <li><i class="flaticon-check-mark"></i>ترک پنجم</li>
                                </ul>
                            </div>
                            <div class="col-lg-8 col-sm-12 col-md-7">
                                <div class="choose-list-home">
                                    <ul>
                                        <li><i class="flaticon-check-mark"></i>ترک ششم</li>
                                        <li><i class="flaticon-check-mark"></i>ترک هفتم</li>
                                        <li><i class="flaticon-check-mark"></i>ترک هشتم</li>
                                        <li><i class="flaticon-check-mark"></i>ترک نهم</li>

                                    </ul>
                                </div>
                            </div>
                            <a href="" class="box-btn">بیشتر بدانید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Choose area -->



    {{--    <!-- News Area -->--}}
    {{--    <section class="home-news pb-100 pt-100">--}}
    {{--        <div class="container">--}}
    {{--            <div class="section-tittle text-center">--}}
    {{--                <h2>آخرین مقالات روشی نو</h2>--}}
    {{--                <p>--}}
    {{--                    ما سعی داریم تا با برترین مقالات علمی پژوهشی در راستای اهداف شما قدمی برداریم.--}}
    {{--                </p>--}}
    {{--            </div>--}}

    {{--            <div class="row">--}}
    {{--                @foreach($posts as $post)--}}
    {{--                <div class="col-lg-4 col-md-6">--}}
    {{--                    <div class="single-home-news">--}}
    {{--                        <a href="{{route('post_detail',['post_id' => $post['id']])}}">--}}
    {{--                            <img src="{{asset($post['post_image'])}}" alt="news" />--}}
    {{--                        </a>--}}

    {{--                        <div class="single-home-content">--}}
    {{--                            <a href="{{route('post_detail',['post_id' => $post['id']])}}">--}}
    {{--                                <h2>--}}
    {{--                                    {{$post['post_title']}}--}}
    {{--                                </h2>--}}
    {{--                            </a>--}}
    {{--                            <p class="calender">--}}
    {{--                                <i class="flaticon-calendar"></i> تاریخ: 10 دی 1398--}}
    {{--                            </p>--}}
    {{--                            <a href="{{route('post_detail',['post_id' => $post['id']])}}">--}}
    {{--                                <p>--}}
    {{--                                    {{$post['post_meta_description']}}--}}
    {{--                                </p>--}}
    {{--                            </a>--}}

    {{--                            <a href="{{route('post_detail',['post_id' => $post['id']])}}" class="line-bnt">--}}
    {{--                                ادامه خواندن--}}
    {{--                                <i class="flaticon-left-arrow"></i>--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- End News Area -->--}}


    <!-- The Modal -->
    {{--    <div class="modal fade" id="EventRegisterModal">--}}
    {{--        <form action="{{route('event_register')}}" method="post" class="modal-dialog">--}}
    {{--            <div class="modal-content">--}}

    {{--                <!-- Modal Header -->--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h4 class="modal-title">ثبت نام رویداد</h4>--}}
    {{--                </div>--}}

    {{--                <!-- Modal body -->--}}
    {{--                <div class="modal-body px-5">--}}
    {{--                  <div class="row">--}}
    {{--                      <div class="col-12 mb-4">--}}
    {{--                          <label>نام :</label>--}}
    {{--                          <input class="form-control form-control-sm rounded-3" name="first_name">--}}
    {{--                      </div>--}}
    {{--                      <div class="col-12 mb-4">--}}
    {{--                          <label>نام خانوادگی :</label>--}}
    {{--                          <input class="form-control form-control-sm rounded-3" name="last_name">--}}
    {{--                      </div>--}}
    {{--                      <div class="col-12 mb-4">--}}
    {{--                          <label>موبایل :</label>--}}
    {{--                          <input class="form-control form-control-sm rounded-3" name="mobile">--}}
    {{--                          <input type="hidden" value="{{$event_info['id']}}" name="event_id">--}}
    {{--                      </div>--}}
    {{--                  </div>--}}
    {{--                </div>--}}

    {{--                <!-- Modal footer -->--}}
    {{--                <div class="modal-footer">--}}
    {{--                    @csrf--}}
    {{--                    <button type="submit" class="btn btn-success">ثبت نام</button>--}}
    {{--                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </form>--}}
    {{--    </div>--}}

@endsection
