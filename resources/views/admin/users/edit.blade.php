@extends('layouts.admin_layout')

@section('Title')پنل مدیریت | ویرایش کاربر@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('admin/assets/css/persianDatePicker.css')}}">
@endsection

@section('custom-js')
    <script src="{{asset('admin/assets/js/persian-date.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/persian-datepicker.min.js')}}"></script>
    <script>
        $(".dropify").dropify();
        @if($this_user_info['birth_day'] == null || $this_user_info['birth_day'] == '')
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
                    <h1>ویرایش کاربر</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.users')}}">
                                    مدیریت کاربران
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش کاربر</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="{{route('admin.users')}}" class="btn btn-sm btn-danger">
                        <i class="fa fa-angle-right mr-2"></i>
                        بازگشت
                    </a>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <form enctype="multipart/form-data"
                          action="{{route('admin.users.update', ['user_id' => $this_user_info['user_id']])}}"
                          method="post"
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
                                               data-default-file="{{$this_user_info['profile']}}">
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
                                               value="{{$this_user_info['first_name']}}">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>نام خانوادگی</label>
                                        @error('last_name')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="last_name"
                                               value="{{$this_user_info['last_name']}}">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>موبایل</label>
                                        @error('mobile')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="mobile"
                                               value="{{$this_user_info['mobile']}}">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>کد ملی</label>
                                        @error('national_code')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="national_code"
                                               value="{{$this_user_info['national_code']}}">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>تاریخ تولد</label>
                                        @error('birth_day')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input readonly type="text" class="form-control datePicker whiteReadOnly"
                                               name="birth_day"
                                               value="{{$this_user_info['birth_day']}}">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>جنسیت</label>
                                        @error('gender')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <select class="form-control" name="gender">
                                            @foreach($genders as $gender)
                                                <option
                                                    @if($gender['gender_id'] == $this_user_info['gender']) selected="selected"
                                                    @endif value="{{$gender['gender_id']}}">
                                                    {{$gender['gender_name']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <label>فعال / غیرفعال</label>
                                        @error('status')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <select class="form-control" name="status">
                                            <option @if($this_user_info['is_active'] == 1) selected="selected" @endif
                                                    value="1">
                                                فعال
                                            </option>
                                            <option @if($this_user_info['is_active'] == 0) selected="selected" @endif
                                                    value="0">
                                                غیر فعال
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
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
    </div>
@endsection
