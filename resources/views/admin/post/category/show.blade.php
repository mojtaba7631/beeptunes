@extends('layouts.admin_layout')

@section('Title')پنل مدیریت | ویرایش دسته بندی@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>ویرایش بندی مقالات</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">پنل مدیریت</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.post_category.index')}}">دسته بندی
                                    مقالات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش دسته بندی
                                ({{$category_info['cat_title']}})
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="{{route('admin.post_category.index')}}" class="btn btn-sm btn-danger">
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
                        <form
                            action="{{route('admin.post_category.update', ['post_category' => $category_info['id']])}}"
                            method="post" class="row">
                            @csrf
                            @method('PUT')
                            <div class="col-12 col-sm-6 col-md-3">
                                <label>عنوان دسته بندی</label>
                                @error('cat_name')
                                <span class="validation_label_error">{{$message}}</span>
                                @enderror
                                <input required type="text" class="form-control" name="cat_name"
                                       value="{{$category_info['cat_title']}}">
                            </div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <button class="btn btn-success w-100 mt-29">ویرایش دسته بندی</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
