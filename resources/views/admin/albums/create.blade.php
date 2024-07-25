@extends('layouts.admin_layout')

@section('Title')
    پنل مدیریت | افزودن آلبوم جدید@endsection

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

        $('#category_select').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200,
            selectAll: true,
            nonSelectedText: 'دسته بندی (ها) را انتخاب کنید',
            filterPlaceholder: 'جستجو کنید',
            allSelectedText: 'همه انتخاب شدند',
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>افزودن آلبوم جدید</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.album_panel')}}">
                                    آلبوم ها
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                افزودن آلبوم جدید
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="{{route('admin.album_panel')}}" class="btn btn-sm btn-danger">
                        <i class="fa fa-angle-right mr-2"></i>
                        بازگشت به لیست آلبوم ها
                    </a>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{route('admin.album_store_panel')}}" method="post" class="row">
                            @csrf
                            <div class="col-12 col-sm-5 col-md-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تصویر آلبوم</label>
                                        @error('album_image')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input name="album_image" type="file" class="form-control dropify">
                                    </div>

                                    <div class="col-12 mt-4">
                                        <label>مجوز ارشاد</label>
                                        @error('album_guidance_permit')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('album_guidance_permit')}}" name="album_guidance_permit" type="text" class="form-control text-right">
                                    </div>

                                    <div class="col-12 mt-4">
                                        <label>کد کتابخانه ملی</label>
                                        @error('album_national_library_code')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('album_national_library_code')}}" name="album_national_library_code" type="text" class="form-control text-right">
                                    </div>

                                    <div class="col-12 mt-4">
                                        <label>صاحب اثر</label>
                                        @error('album_author')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('album_author')}}" name="album_author" type="text" class="form-control">
                                    </div>

                                    <div class="col-12 mt-4">
                                        <label>قیمت (تومان)</label>
                                        @error('price')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('price')}}" name="price" type="text" class="form-control text-right">
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-sm-7 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-md-8 mb-4">
                                        <label>عنوان آلبوم</label>
                                        @error('album_title')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('album_title')}}" name="album_title" type="text" class="form-control">
                                    </div>

                                    <div class="col-12 col-md-4 mb-4">
                                        <label>نامک آلبوم (لاتین)</label>
                                        @error('album_nickname')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('album_nickname')}}" type="text" class="form-control text-right" name="album_nickname">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6 mb-4">
                                        <label>دسته بندی های آلبوم</label>
                                        @error('category')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <div class="multiselect_div">
                                            <select id="category_select"
                                                    class="multiselect multiselect-custom form-control"
                                                    name="category">
                                                @foreach($categories as $category)
                                                    <option value="{{$category['id']}}">
                                                        {{$category['cat_title']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <label>نوع آلبوم</label>
                                        @error('album_type')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <select class="form-control" name="album_type">
                                            <option value="0" selected>
                                                دانلودی
                                            </option>
                                            <option value="1">
                                                فیزیکی
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <label>محتوای آلبوم</label>
                                        @error('album_content')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <textarea name="album_content" class="summernote">{{old('album_content')}}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <label>کلمات کلیدی متا (با enter جدا شود)</label>
                                        @error('album_meta_keywords')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <div class="input-group demo-tagsinput-area">
                                            <input name="album_meta_keywords" type="text" class="form-control"
                                                   value="{{old('album_meta_keywords')}}" data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <label>توضیحات متا</label>
                                        @error('album_meta_description')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{old('album_meta_description')}}" type="text" class="form-control" name="album_meta_description">
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <button class="btn btn-success w-100">
                                            <i class="fa fa-plus mr-2"></i>
                                            افزودن آلبوم
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
