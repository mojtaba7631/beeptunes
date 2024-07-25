@extends('layouts.admin_layout')

@section('Title')
    پنل مدیریت | تماس با ما
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
                    <h1>تماس با ما</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                تماس با ما
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
                              action="{{route('admin.contact_us_update', ['id'=>$contact_info['id']])}}" method="post"
                              class="row">
                            @csrf
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-6 mt-3">
                                        <label>ساعت کاری</label>
                                        @error('work_time')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$contact_info['work_time']}}" name="work_time" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <label>آدرس</label>
                                        @error('address')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$contact_info['address']}}" name="address" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <label>تلفن اول</label>
                                        @error('phone1')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$contact_info['phone1']}}" name="phone1" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <label>تلفن دوم</label>
                                        @error('phone2')
                                        <span class="validation_label_error">{{$message}}</span>
                                        @enderror
                                        <input value="{{$contact_info['phone2']}}" name="phone2" type="text"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">

                                <div class="row justify-content-end">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <button class="btn btn-success w-100">
                                            <i class="fa fa-edit mr-2"></i>
                                            ویرایش تماس با ما
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
