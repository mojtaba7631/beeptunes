@extends('layouts.admin_layout')

@section('Title')پنل مدیریت | کاربران@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('admin/assets/css/persianDatePicker.css')}}">
@endsection

@section('custom-js')
    <script src="{{asset('admin/assets/js/persian-date.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/persian-datepicker.min.js')}}"></script>
    <script>
        $(".dropify").dropify();
        @if($user_info['birth_day'] == null || $user_info['birth_day'] == '')
        $('.datePicker').persianDatepicker({
            format: "YYYY/MM/DD",
            viewMode: 'year',
            initialValue: false
        });
        @else
        $('.datePicker').persianDatepicker({
            format: "YYYY/MM/DD",
            viewMode: 'year',
        });
        @endif
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>ویرایش پروفایل</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش پروفایل</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <form enctype="multipart/form-data" action="{{route('admin.profile_update')}}" method="post"
                          class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تصویر</label>
                                        @error('profile')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input type="file" class="dropify" name="profile"
                                               data-default-file="{{$user_info['profile']}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>نام</label>
                                        @error('first_name')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="first_name"
                                               value="{{$user_info['first_name']}}">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>نام خانوادگی</label>
                                        @error('last_name')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="last_name"
                                               value="{{$user_info['last_name']}}">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>موبایل</label>
                                        @error('mobile')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="mobile"
                                               value="{{$user_info['mobile']}}">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>کد ملی</label>
                                        @error('national_code')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="national_code"
                                               value="{{$user_info['national_code']}}">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>تاریخ تولد</label>
                                        @error('birth_day')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input readonly type="text" class="form-control datePicker whiteReadOnly"
                                               name="birth_day"
                                               value="{{$user_info['birth_day']}}">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>جنسیت</label>
                                        @error('gender')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <select class="form-control" name="gender">
                                            @foreach($genders as $gender)
                                                <option
                                                    @if($gender['gender_id'] == $user_info['gender']) selected="selected"
                                                    @endif value="{{$gender['gender_id']}}">
                                                    {{$gender['gender_name']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <button type="submit" class="btn btn-success w-100">
                                            ذخیره تغییرات
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('admin.changePass')}}" method="post" class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3">
                                <label>کلمه عبور فعلی</label>
                                @error('first_name')
                                <span class="validation_label_error">{{$message}}</span>
                                @enderror
                                <input type="password" class="form-control" name="old_password">
                            </div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <label>کلمه عبور جدید</label>
                                @error('first_name')
                                <span class="validation_label_error">{{$message}}</span>
                                @enderror
                                <input type="password" class="form-control" name="new_password">
                            </div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <label>تکرار کلمه عبور جدید</label>
                                @error('last_name')
                                <span class="validation_label_error">{{$message}}</span>
                                @enderror
                                <input type="password" class="form-control" name="confirm_new_password">
                            </div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <button type="submit" class="btn btn-success w-100 mt-29">
                                    تغییر کلمه عبور
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
