@extends('layouts.admin_layout')
@section('Title')
    پنل مدیریت | دسته بندی آلبوم ها
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

        //sweetalert
        function show_sweetalert_msg(msg, icon) {
            new swal({
                html: "<p class='my_toast_txt'>" + msg + "</p>",
                toast: true,
                icon: icon,
                showConfirmButton: false,
                position: 'top',
                timerProgressBar: true,
                timer: 3500
            });
        }

        function removeCatAlbum(cat_album_id){
            var RemoveModal = $("#RemoveModal");
            var action = "/panel/cat_album_delete_panel/" + cat_album_id;
            RemoveModal.find('form').attr('action', action);
            RemoveModal.modal('show');
        }

        function showUpdateCatAlbum(tag, cat_album_id) {
            let tr = $(tag).parents('tr');
            let category_title = tr.find('.cat_name_tag').text();
            var UpdateModal = $("#UpdateModal");
            var cat_album_name = $("#cat_album_name");

            var action = "/panel/cat_album_update_panel/" + cat_album_id;

            cat_album_name.val(category_title.trim());

            UpdateModal.find('form').attr('action', action);
            UpdateModal.modal('show');
        }


    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>دسته بندی آلبوم ها</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{route('admin.album_panel')}}">
                                    آلبوم ها
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="{{route('admin.album_panel')}}" class="btn btn-sm btn-danger">
                        <i class="fa fa-arrow-right mr-2"></i>
                        بازگشت به لیست آلبوم ها
                    </a>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12 col-md-3">
                <form action="{{route('admin.cat_album_store_panel')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <label>
                                نام دسته
                            </label>
                            <input type="text" class="form-control mt-3" name="cat_title" id="cat_title">
                            <button type="submit" class="btn btn-success mt-3 w-100">
                                <i class="fa fa-save pl-2"></i>
                                افزودن دسته
                            </button>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-9">
                @if(!empty($categories->all()))
                    <div class="table-responsive">
                        <table class="table table-hover table-custom spacing8">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان دسته</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $row = (($categories->currentPage() - 1) * $categories->perPage() ) + 1;
                            @endphp
                            @foreach($categories as $cat)
                                <tr>
                                    <td class="w60">
                                        <span>{{$row}}</span>
                                    </td>

                                    <td class="cat_name_tag">
                                        {{$cat['cat_title']}}
                                    </td>

                                    <td>
                                        <a onclick="showUpdateCatAlbum(this,'{{$cat['id']}}')">
                                            <button class="btn btn-primary" data-toggle="tooltip" title="ویرایش دسته آلبوم">
                                                <i class="icon-pencil"></i>
                                            </button>
                                        </a>

                                        <button onclick="removeCatAlbum({{$cat['id']}})" class="btn btn-danger"
                                                data-toggle="tooltip" title="حذف دسته آلبوم">
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

                        {{$categories->links()}}
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
                    <h4 class="modal-title">حذف دسته</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="alert alert-danger">
                        آیا از حذف دسته اطمینان دارید؟
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


    <!-- The Modal -->
    <div class="modal" id="UpdateModal">
        <div class="modal-dialog">
            <form action="" method="post" class="modal-footer">
                @csrf
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">ویرایش دسته</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <label>
                            نام دسته
                        </label>
                        <input type="text" class="form-control" id="cat_album_name" name="cat_title">
                    </div>

                    <!-- Modal footer -->
                    <div class="text-right p-2">
                        <button type="submit" class="btn btn-success w-25">
                            <i class="fa fa-pencil pr-2"></i>
                            ویرایش
                        </button>

                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection


