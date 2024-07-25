@extends('layouts.admin_layout')

@section('Title')
    پنل مدیریت | ویرایش آزمون جدید
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
                    <h1>ویرایش آزمون جدید</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.test_panel')}}">
                                    آزمون ها
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                ویرایش آزمون جدید
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="{{route('admin.test_panel')}}" class="btn btn-sm btn-danger">
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
                        <form enctype="multipart/form-data" action="{{route('admin.test_update_panel',['test_id' => $test_info['id']])}}" method="post" class="row">
                            @csrf
                            <div class="col-12 col-sm-5 col-md-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تصویر آزمون</label>
                                        @error('test_image')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input name="test_image" type="file" class="form-control dropify" data-default-file="{{$test_info['test_image']}}">
                                    </div>
                                    <div class="col-12 mt-5">
                                        <label>نوع آزمون</label>
                                        @error('main_test')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <select class="form-control" name="main_test">
                                            @foreach($main_test as $test)
                                                <option @if($test['id'] == $test_info['main_test']) selected="selected" @endif value="{{$test['id']}}">
                                                    {{$test['name']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-7 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-md-8 mb-4">
                                        <label>عنوان آزمون</label>
                                        @error('test_name')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$test_info['test_name']}}" name="test_name" type="text" class="form-control">
                                    </div>

                                    <div class="col-12 col-md-4 mb-4">
                                        <label>نامک آزمون (لاتین)</label>
                                        @error('test_slug')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$test_info['test_slug']}}" type="text" class="form-control" name="test_slug">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <label>محتوای آزمون</label>
                                        @error('test_description')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <textarea name="test_description" class="summernote">{{$test_info['test_description']}}"</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <label>کلمات کلیدی متا (با enter جدا شود)</label>
                                        @error('test_meta_keywords')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <div class="input-group demo-tagsinput-area">
                                            <input name="test_meta_keywords" type="text" class="form-control"
                                                   value="{{$test_info['test_meta_keywords']}}" data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <label>توضیحات متا</label>
                                        @error('test_meta_description')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$test_info['test_meta_description']}}" type="text" class="form-control" name="test_meta_description">
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fa fa-plus mr-2"></i>
                                            افزودن آزمون
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

