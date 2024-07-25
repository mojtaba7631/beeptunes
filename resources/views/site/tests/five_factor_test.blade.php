@extends('layouts.site_layout')
@section('title')
    سوالات آزمون {{$test_info['test_name']}}
@endsection

@section('custom-css')
    <style>
        .post_image img {
            width: 100%;
        }

        .my_lbl {
            cursor: pointer;
        }

        .my_reg_input {
            border-radius: 6px !important;
        }

        .my_hr {
            width: 80%;
            height: 10px;
            background-color: red;
            margin: 20px auto;

        }

        #completely_opposed,
        #somewhat_opposite,
        #no_idea,
        #somewhat_agree,
        #completely_agree {
            margin: 5px;
            cursor: pointer;
        }

        #completely_opposed_,
        #somewhat_opposite_,
        #no_idea_,
        #somewhat_agree_,
        #completely_agree_ {
            cursor: pointer;
        }

        #completely_opposed:hover {
            background-color: #5a7db2;
            color: #fff;
            cursor: pointer;
            margin: 5px;
        }

        #somewhat_opposite:hover {
            background-color: #5a7db2;
            color: #fff;
            cursor: pointer;
            margin: 5px;
        }

        #no_idea:hover {
            background-color: #5a7db2;
            color: #fff;
            cursor: pointer;
            margin: 5px;
        }

        #somewhat_agree:hover {
            background-color: #5a7db2;
            color: #fff;
            cursor: pointer;
            margin: 5px;
        }

        #completely_agree:hover {
            background-color: #5a7db2;
            color: #fff;
            cursor: pointer;
            margin: 5px;
        }

        #user_information {
            border-radius: 10px;
        }

        .question_bx{
            background-color: #a4e29b;
            padding: 25px;
            border-radius: 30px;
        }

        #questionBoxContainer > .the_question {
            display: none;
        }

        .btn_clear {
            background: transparent;
            border: none;
        }
        .text_left{
            text-align: left !important;
        }
        .my_img{
            width: 100% !important;
            height: 400px;
        }
    </style>
@endsection

@section('custom-js')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script>
        let my_fullscreen_loader = $("#my_fullscreen_loader");
        let questionBoxContainer = $("#questionBoxContainer");
        let the_questions_length = questionBoxContainer.find(".the_question").length;
        let question_number = 1;
        let answers = [];

        //sweetalert
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

        function test_user_register() {
            var mobile = document.getElementById('mobile');
            var first_name = document.getElementById('first_name');
            var last_name = document.getElementById('last_name');
            if (mobile.value === "") {
                alert('porkon1');
            }
            if (first_name.value === "") {
                alert('porkon2');
            }
            if (last_name.value === "") {
                alert('porkon3');
            }
            if (mobile.value !== "" && first_name.value !== "" && last_name.value !== "") {
                let data = {
                    mobile: mobile.value,
                    first_name: first_name.value,
                    last_name: last_name.value,
                    _token: "{{csrf_token()}}"
                };

                $.ajax({
                    url: '{{route("test_user_register")}}',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                    success: function (response) {

                        if (response.error) {
                            show_sweetalert_msg(response.message, 'error');
                            return false;
                        } else {
                            questionBoxContainer.find('.the_question:nth-child(1)').slideDown()
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

        }

        function GoToNextQuestion(question_id, answer) {
            var user_information = document.getElementById('user_information');

            user_information.style.display='none';

            answers.push({
                question_id: question_id,
                answer: answer,
            });
            questionBoxContainer.find('.the_question:nth-child(' + question_number + ')').slideUp();

            if (the_questions_length > answers.length) {
                question_number++;
                questionBoxContainer.find('.the_question:nth-child(' + (question_number) + ')').slideDown();
            } else {
                let data = {
                    answers: answers,
                    _token: "{{csrf_token()}}"
                };

                $.ajax({
                    url: '{{route("submitFiveFactorTest")}}',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                    success: function (response) {
                        if (response.error) {
                            show_sweetalert_msg(response.message, 'error');
                            return false;
                        } else {
                            show_sweetalert_msg(response.message, 'success');
                            window.location.href = "/";
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
        }

        function GoToPrevQuestion(index) {
            answers.splice((index - 1), 1);

            questionBoxContainer.find('.the_question:nth-child(' + question_number + ')').slideUp();
            question_number--;
            questionBoxContainer.find('.the_question:nth-child(' + (question_number) + ')').slideDown();
        }
    </script>
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
                            <img src="{{asset($test_info['test_image'])}}" alt="news" class="my_img"/>
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
                                <input type="text" class="form-control about-search" placeholder="جستجو ..."/>
                            </div>
                            <button type="submit"><i class="flaticon-search"></i></button>
                        </form>
                    </div>
                </div>

                <div class="col-12">
                    <div class="consultation-area">
                        <div class="text-center">
                            <h4 class="text-center mb-4">
                                {{$test_info['test_name']}}
                            </h4>
                            <hr class="my_hr">
                        </div>

                        <div class="row mb-5" id="user_information">
                            <div class="col-12 col-md-3"></div>
                            <div class="col-12 col-md-6 question_bx">
                                <div class="row ">
                                    <h4 class="text-center mb-4">لطفا ابتدا اطلاعات را پر نمایید و سپس آزمون را شروع کنید</h4>
                                    <div class="col-12 col-md-4">
                                        <label>
                                            نام :
                                        </label>
                                        <input type="text" class="form-control-sm my_reg_input" name="first_name"
                                               id="first_name">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label>
                                            نام خانوادگی :
                                        </label>
                                        <input type="text" class="form-control-sm my_reg_input" name="last_name" id="last_name">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label>
                                            موبایل :
                                        </label>
                                        <input type="text" class="form-control-sm my_reg_input" name="mobile" id="mobile">
                                    </div>
                                    <div class="col-12 text-center mt-2">
                                        <button class="btn btn-success w-25 mt-2" onclick="test_user_register(1)">
                                            شروع آزمون
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-md-3"></div>

                        </div>

                        <div id="questionBoxContainer">
                            @foreach($five_factor_info as $key => $factor)
                                <div class="row the_question">
                                    <div class="col-12">
                                        <div class="alert alert-warning">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    {{$key + 1}} -
                                                    {{$factor['question']}}
                                                </div>
                                                <div class="col-12 col-md-6 text_left">
                                                    @if($key > 0)
                                                        <button onclick="GoToPrevQuestion({{$key}})" class="btn_clear text-left text-danger">
                                                            <i class="fa fa-angle-right ml-4"></i>
                                                            برگشت به سوال قبلی
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12"
                                         onclick="GoToNextQuestion({{$factor['id']}}, '1')">

                                        <div class="alert alert-info">
                                            <label class="my_lbl">کاملا مخالفم</label>
                                        </div>
                                    </div>

                                    <div class="col-12"
                                         onclick="GoToNextQuestion({{$factor['id']}}, '2')">

                                        <div class="alert alert-info">
                                            <label class="my_lbl">تا حدودی مخالف</label>
                                        </div>
                                    </div>

                                    <div class="col-12"
                                         onclick="GoToNextQuestion({{$factor['id']}}, '3')">

                                        <div class="alert alert-info">
                                            <label class="my_lbl">نظری ندارم</label>
                                        </div>
                                    </div>

                                    <div class="col-12"
                                         onclick="GoToNextQuestion({{$factor['id']}}, '4')">

                                        <div class="alert alert-info">
                                            <label class="my_lbl">تا حدودی موافق</label>
                                        </div>
                                    </div>

                                    <div class="col-12"
                                         onclick="GoToNextQuestion({{$factor['id']}}, '5')">

                                        <div class="alert alert-info">
                                            <label class="my_lbl">کاملا موافق</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End News Area -->
@endsection

