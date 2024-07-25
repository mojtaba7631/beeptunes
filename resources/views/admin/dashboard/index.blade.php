@extends('layouts.admin_layout')

@section('Title')پنل مدیریت | داشبورد@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>داشبورد</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">پنل مدیریت</a></li>
                            <li class="breadcrumb-item active" aria-current="page">داشبورد</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                        <i class="icon-settings"></i>
                        دکمه یک
                    </a>

                    <a href="javascript:void(0);" class="btn btn-sm btn-success">
                        <i class="icon-settings"></i>
                        دکمه دو
                    </a>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex align-items-center">
                            <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                    class="fa fa-user"></i></div>
                            <div class="ml-4">
                                <span>تعداد کل کاربران</span>
                                <h4 class="mb-0 font-weight-medium">
                                    {{$userCount}} نفر
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex align-items-center">
                            <div class="icon-in-bg bg-azura text-white rounded-circle"><i
                                    class="fa fa-credit-card"></i></div>
                            <div class="ml-4">
                                <span>هزینه جدید</span>
                                <h4 class="mb-0 font-weight-medium">3,805 تومان</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex align-items-center">
                            <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-users"></i>
                            </div>
                            <div class="ml-4">
                                <span>بازدید روزانه</span>
                                <h4 class="mb-0 font-weight-medium">5,805</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex align-items-center">
                            <div class="icon-in-bg bg-pink text-white rounded-circle"><i
                                    class="fa fa-life-ring"></i></div>
                            <div class="ml-4">
                                <span>نرخ بیکاری</span>
                                <h4 class="mb-0 font-weight-medium">13,651 تومان</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
