@extends('layouts.admin_layout')

@section('Title')
    پنل مدیریت | درباره ما
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}"/>
@endsection

@section('custom-js')
    <script src="{{asset('admin/assets/vendor/summernote/dist/summernote.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script>
        $(".dropify").dropify();
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>درباره ما</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                درباره ما
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data"
                              action="{{route('admin.about_us_update', ['id'=>$about_us_info['id']])}}" method="post"
                              class="row">
                            @csrf
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تصویر درباره ما</label>
                                        @error('about_image')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input data-default-file="{{asset($about_us_info['about_image'])}}" name="about_image"
                                               type="file" class="form-control dropify">
                                    </div>
                                    <div class="col-12 mt-4">
                                        <label>محتوای درباره ما</label>
                                        @error('description')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <textarea name="description"
                                                  class="summernote">{{$about_us_info['description']}}</textarea>
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>تصویر اولین یوزر</label>
                                        @error('about_first_user_image')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input data-default-file="{{asset($about_us_info['about_first_user_image'])}}" name="about_first_user_image"
                                               type="file" class="form-control dropify">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>تصویر دومین یوزر</label>
                                        @error('about_second_user_image')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input data-default-file="{{asset($about_us_info['about_second_user_image'])}}" name="about_second_user_image"
                                               type="file" class="form-control dropify">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>تصویر سومین یوزر</label>
                                        @error('about_third_user_image')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input data-default-file="{{asset($about_us_info['about_third_user_image'])}}" name="about_third_user_image"
                                               type="file" class="form-control dropify">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>تصویر چهارمین یوزر</label>
                                        @error('about_fourth_user_image')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input  data-default-file="{{asset($about_us_info['about_fourth_user_image'])}}" name="about_fourth_user_image"
                                               type="file" class="form-control dropify">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>نام اولین یوزر</label>
                                        @error('about_first_user_name')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$about_us_info['about_first_user_name']}}" name="about_first_user_name" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>نام دومین یوزر</label>
                                        @error('about_second_user_name')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$about_us_info['about_second_user_name']}}" name="about_second_user_name" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>نام سومین یوزر</label>
                                        @error('about_third_user_name')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$about_us_info['about_third_user_name']}}" name="about_third_user_name" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>نام چهارمین یوزر</label>
                                        @error('about_fourth_user_name')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$about_us_info['about_fourth_user_name']}}" name="about_fourth_user_name" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>تخصص اولین یوزر</label>
                                        @error('about_first_user_education')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$about_us_info['about_first_user_education']}}" name="about_first_user_education" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>تخصص دومین یوزر</label>
                                        @error('about_second_user_education')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$about_us_info['about_second_user_education']}}" name="about_second_user_education" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>تخصص سومین یوزر</label>
                                        @error('about_third_user_education')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$about_us_info['about_third_user_education']}}" name="about_third_user_education" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3">
                                        <label>تخصص چهارمین یوزر</label>
                                        @error('about_fourth_user_education')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$about_us_info['about_fourth_user_education']}}" name="about_fourth_user_education" type="text"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-12 col-md-3 mt-4">
                                        <label>تیتر بالای اعضا</label>
                                        @error('about_title')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$about_us_info['about_title']}}" name="about_title" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-9 mt-4">
                                        <label>جمله ی بالای اعضا</label>
                                        @error('about_sub_title')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$about_us_info['about_sub_title']}}" name="about_sub_title" type="text"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">

                                <div class="row justify-content-end">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <button class="btn btn-success w-100">
                                            <i class="fa fa-edit mr-2"></i>
                                            ویرایش درباره ما
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
