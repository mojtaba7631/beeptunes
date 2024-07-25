@extends('layouts.admin_layout')

@section('Title')
    پنل مدیریت | آزمون ها

@endsection

@section('custom-css')
    <style>
        .my_test_img{
            width: 120px;
            height: 70px;
        }
        .my_a{
            width: 170px !important;
        }
    </style>
@endsection
@section('custom-js')
    <script>
        function removeTest(id) {
            var removeModal = $("#RemoveModal");
            var action = "/panel/tests_delete/" + id;
            removeModal.find('form').attr('action', action);
            removeModal.modal('show');
        }
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>آزمون ها</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">آزمون ها</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 col-sm-12 text-right">
                    <div class="row">
                        <div class="col-12 col-md-4 mt-2 text-center">
                            <a href="{{route('admin.five_factors')}}" class="btn btn-sm btn-success my_a">
                                <i class="fa fa-plus mr-2"></i>
                                افزودن سوالات 5 عاملی
                            </a>
                        </div>
                        <div class="col-12 col-md-4 mt-2 text-center">
                            <a href="{{route('admin.five_factors')}}" class="btn btn-sm btn-warning my_a">
                                <i class="fa fa-plus mr-2"></i>
                                افزودن سوالات BFI
                            </a>
                        </div>
                        <div class="col-12 col-md-4 mt-2 text-center">
                            <a href="{{route('admin.five_factors')}}" class="btn btn-sm btn-secondary my_a">
                                <i class="fa fa-plus mr-2"></i>
                                افزودن سوالات haland
                            </a>
                        </div>
                        <div class="col-12 col-md-4 mt-2 text-center">
                            <a href="{{route('admin.five_factors')}}" class="btn btn-sm btn-primary my_a">
                                <i class="fa fa-plus mr-2"></i>
                                افزودن سوالات mbti
                            </a>
                        </div>
                        <div class="col-12 col-md-4 mt-2 text-center">
                            <a href="{{route('admin.five_factors')}}" class="btn btn-sm btn-dark my_a">
                                <i class="fa fa-plus mr-2"></i>
                                افزودن سوالات neo
                            </a>
                        </div>
                        <div class="col-12 col-md-4 mt-2 text-center">
                            <a href="{{route('admin.five_factors')}}" class="btn btn-sm btn-info my_a">
                                <i class="fa fa-plus mr-2"></i>
                                افزودن سوالات strong
                            </a>
                        </div>
                        <div class="col-12 mt-2 text-center">
                            <a href="{{route('admin.test_create_panel')}}" class="btn btn-sm btn-success w-100">
                                <i class="fa fa-plus mr-2"></i>
                                افزودن آزمون
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                @if(!empty($tests_info->all()))
                    <div class="table-responsive">
                        <table class="table table-hover table-custom spacing8">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>تصویر آزمون</th>
                                <th>عنوان آزمون</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $row = (($tests_info->currentPage() - 1) * $tests_info->perPage() ) + 1;
                            @endphp
                            @foreach($tests_info as $test_info)
                                <tr>
                                    <td class="w60">
                                        <span>{{$row}}</span>
                                    </td>

                                    <td>
                                        <img src="{{asset($test_info['test_image'])}}" class="my_test_img">
                                    </td>

                                    <td>
                                        <p class="mb-0">
                                            {{$test_info['test_name']}}
                                        </p>
                                    </td>

                                    <td>
                                        <a href="{{route('admin.test_edit_panel', ['test_id' => $test_info['id']])}}">
                                            <button class="btn btn-primary" data-toggle="tooltip" title="ویرایش آزمون">
                                                <i class="icon-pencil"></i>
                                            </button>
                                        </a>

                                        <button onclick="removeTest({{$test_info['id']}})" class="btn btn-danger" data-toggle="tooltip" title="حذف آزمون">
                                            <i class="icon-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                                @php
                                    $row++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>

                        {{$tests_info->links()}}
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <p class="alert alert-danger mb-0">
                                        موردی یافت نشد.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="RemoveModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">حذف آزمون</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="alert alert-danger">
                        آیا از حذف آزمون اطمینان دارید؟
                    </p>
                </div>

                <!-- Modal footer -->
                <form action="" method="post" class="modal-footer">
                    @csrf
                    <button type="submit" class="btn btn-success">بله مطمئنم</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">خیر</button>
                </form>

            </div>
        </div>
    </div>
@endsection
