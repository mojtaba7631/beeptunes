@extends('layouts.admin_layout')

@section('Title')
    پنل مدیریت | 5 عاملی
@endsection

@section('custom-css')
    <style>
        .w-100px {
            width: 100px;
        }

        .w-70px {
            width: 70px;
        }
    </style>
@endsection

@section('custom-js')
    <script>
        let the_dropify = $(".dropify");
        the_dropify.dropify();

        function show_update_modal(tag, id) {
            let tr = $(tag).parents('tr');
            let update_modal = $("#UpdateModal");

            let action = "/panel/five_factors_update_panel/" + id;
            update_modal.find('form').attr('action', action);

            let name = tr.find('.model_name_tag').text();
            let nickname = tr.find('.model_nickname_tag').text();
            let character_id = tr.find('.model_character_tag').text();

            update_modal.find('.model_name_tag').val(name.trim());
            update_modal.find('.model_nickname_tag').val(nickname);
            update_modal.find('.model_brand_tag').val(character_id);

            update_modal.modal('show');
        }

        function show_delete_modal(id, name) {
            let deleteModal = $("#deleteModal");

            let action = "/panel/five_factors_delete_panel/" + id;
            deleteModal.find('form').attr('action', action);

            deleteModal.find('.model_name_span').text(" " + name + " ");

            deleteModal.modal('show');
        }
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>5 عاملی</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                5 عاملی
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                        <div class="col-12 mt-2">
                            <a href="{{route('admin.test_panel')}}" class="btn btn-sm btn-danger">
                                <i class="fa fa-arrow-right mr-2"></i>
                                بازگشت به آزمون ها
                            </a>
                        </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12 col-md-3">
                <form action="{{route('admin.five_factors_store_panel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label>سوال 5 عاملی</label>
                                    @error('question')
                                    <span class="validation_label_error">{{$message}}</span>
                                    @enderror
                                    <textarea name="question" type="text" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="col-12 mb-4">
                                    <label>دسته شخصیتی</label>
                                    @error('character')
                                    <span class="validation_label_error">{{$message}}</span>
                                    @enderror
                                   <select class="form-control" name="character">
                                       <option value="1">برون گرایی - درون گرایی</option>
                                       <option value="2">توافق پذیری - تضاد</option>
                                       <option value="3">وجدان - عدم توجه (بی خیالی)</option>
                                       <option value="4">روان رنجوری - ثبات عاطفی</option>
                                       <option value="5">باز بودن - عدم داشتن تجربه</option>
                                   </select>
                                </div>
                                <div class="col-12 mb-4">
                                    <button type="submit" class="btn btn-success w-100">
                                        <i class="fa fa-plus mr-2"></i>
                                        افزودن سوال 5 عاملی
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-9">
                @if(!empty($five_factor_info->all()))
                    <div class="table-responsive">
                        <table class="table table-hover table-custom spacing8 text-center">
                            <tr>
                                <th>#</th>
                                <th>سوال</th>
                                <th>دسته شخصیتی</th>
                                <th>عملیات</th>
                            </tr>

                            @php $num = (($five_factor_info->currentPage() - 1) * $five_factor_info->perPage() ) + 1; @endphp
                            @foreach($five_factor_info as $five_factor)
                                <tr>
                                    <td>{{$num}}</td>
                                    <td class="model_name_tag">
                                        {{$five_factor['question']}}
                                    </td>
                                    <td>
                                        <input type="hidden"  class="model_character_tag" value="{{$five_factor['character']}}">
                                        {{\App\Helper\GetCharacterTitle::get_character_title($five_factor['character'])}}
                                    </td>
                                    <td>
                                        <button
                                            onclick="show_update_modal(this, '{{$five_factor['id']}}')"
                                            class="btn btn-primary mr-2">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <button
                                            onclick="show_delete_modal('{{$five_factor['id']}}', '{{$five_factor['model_name']}}')"
                                            class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php $num++ @endphp
                            @endforeach
                        </table>
                    </div>

                    @if($five_factor_info->lastPage() > 1)
                        <div class="card">
                            <div class="card-body">
                                {{$five_factor_info->links()}}
                            </div>
                        </div>
                    @endif
                @else
                    <div class="card">
                        <div class="card-body">
                            <p class="alert alert-danger mb-0">موردی یافت نشد</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="UpdateModal">
        <div class="modal-dialog">
            <form action="" enctype="multipart/form-data"
                  method="post" class="modal-content">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">ویرایش سوال</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <label>سوال 5 عاملی</label>
                            <input name="name" type="text" class="form-control model_name_tag  text-left">
                        </div>
                        <div class="col-12 mb-4">
                            <label>دسته شخصیتی</label>
                            <select class="form-control model_brand_tag" name="character">
                                <option value="">لطفا دسته شخصیت سوال را انتخاب کنید</option>
                                <option value="1">برون گرایی - درون گرایی</option>
                                <option value="2">توافق پذیری - تضاد</option>
                                <option value="3">وجدان - عدم توجه (بی خیالی)</option>
                                <option value="4">روان رنجوری - ثبات عاطفی</option>
                                <option value="5">باز بودن - عدم داشتن تجربه</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    @csrf
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit mr-2"></i>
                        ویرایش سوال
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                </div>
            </form>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">حذف سوال</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="alert alert-danger">
                        آیا از حذف سوال اطمینان دارید؟
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
