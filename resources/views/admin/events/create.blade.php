@extends('layouts.admin_layout')

@section('Title')
    پنل مدیریت | افزودن رویداد جدید
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/css/persianDatePicker.css')}}">
@endsection

@section('custom-js')
    <script src="{{asset('admin/assets/vendor/summernote/dist/summernote.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('admin/assets/js/persian-date.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/persian-datepicker.min.js')}}"></script>
    <script>
        $(".dropify").dropify();

        $('#category_select').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200,
            selectAll: true,
            nonSelectedText: 'دسته بندی (ها) را انتخاب کنید',
            filterPlaceholder: 'جستجو کنید',
            allSelectedText: 'همه انتخاب شدند',
        });

        $('.datePicker').persianDatepicker({
            format: "YYYY/MM/DD",
            viewMode: 'year',
            initialValue: false
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>
                        افزودن رویداد جدید
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.events_panel')}}">
                                    رویداد
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                افزودن رویداد جدید
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="{{route('admin.events_panel')}}" class="btn btn-sm btn-danger">
                        <i class="fa fa-angle-right mr-2"></i>
                        بازگشت
                    </a>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{route('admin.events_store_panel')}}" method="post" class="row">
                            @csrf
                            <div class="col-12 col-sm-5 col-md-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تصویر رویداد</label>
                                        @error('event_image')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input name="event_image" type="file" class="form-control dropify">
                                    </div>

                                    <div class="col-12  mt-4">
                                        <label>تاریخ شروع رویداد</label>
                                        @error('event_date')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('event_date')}}" type="text" class="form-control datePicker whiteReadOnly" name="event_date">
                                    </div>

                                    <div class="col-12  mt-4">
                                        <label>مبلغ رویداد(تومان)</label>
                                        @error('price')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('price')}}" type="text" class="form-control datePicker whiteReadOnly" name="price"
                                        placeholder="در صورتی که مبلغی نوشته نشود رویداد رایگان می باشد">
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-sm-7 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-md-4 mb-4">
                                        <label>عنوان رویداد</label>
                                        @error('event_title')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('event_title')}}" name="event_title" type="text" class="form-control">
                                    </div>

                                    <div class="col-12 col-md-8 mb-4">
                                        <label>توضیح کوتاه رویداد</label>
                                        @error('short_title')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('short_title')}}" type="text" class="form-control" name="short_title">
                                    </div>

                                    <div class="col-12 mt-4">
                                        <label class="text-danger">لطفا تاریخ رویداد را برای نمایش روزشمار به میلادی شبیه مثال بنویسید</label>
                                        @error('event_date_counter')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('event_date_counter')}}" type="text" class="form-control text-right"
                                               name="event_date_counter" placeholder="March 12, 2024 00:00:00">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <label>محتوای رویداد</label>
                                        @error('event_content')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <textarea name="event_content" class="summernote">{{old('event_content')}}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <label>کلمات کلیدی متا (با enter جدا شود)</label>
                                        @error('event_meta_keywords')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <div class="input-group demo-tagsinput-area">
                                            <input name="event_meta_keywords" type="text" class="form-control"
                                                   value="{{old('event_meta_keywords')}}" data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fa fa-plus mr-2"></i>
                                            افزودن رویداد
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
