@extends('layouts.admin_layout')
@section('Title')
    پنل مدیریت | ترک های آلبوم {{$album_title}}
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}"/>
    <style>
        .track_img{
            width: 100px;
            height: 100px;
        }
    </style>
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

        function removeTrack(track_id){
            var RemoveModal = $("#RemoveModal");
            var action = "/panel/track_destroy_panel/" + track_id;
            RemoveModal.find('form').attr('action', action);
            RemoveModal.modal('show');
        }
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>ترک های آلبوم  {{$album_title}}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{route('admin.album_panel')}}">
                                    ترک های آلبوم {{$album_title}}
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
            <div class="col-12 col-md-4">
                <form action="{{route('admin.album_track_store',['album_id' => $album_id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label>تصویر ترک</label>
                                    @error('track_image')
                                    <span class="validation_label_error">{{$message}}</span>
                                    @enderror
                                    <input name="track_image" type="file" class="form-control dropify">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label>فایل ترک</label>
                                    @error('track_file')
                                    <span class="validation_label_error">{{$message}}</span>
                                    @enderror
                                    <input name="track_file" type="file" class="form-control dropify">
                                </div>
                                <div class="col-12 mt-4">
                                    <label>
                                        نام ترک
                                    </label>
                                    <input type="text" class="form-control" name="track_title" id="track_title">
                                </div>
                                <div class="col-12 mt-4">
                                    <label>
                                        نامک ترک
                                    </label>
                                    <input type="text" class="form-control" name="track_nickname" id="track_nickname">
                                </div>
                                <div class="col-12 mt-4">
                                    <label>
                                        تایم ترک
                                    </label>
                                    <input type="text" class="form-control" name="track_time" id="track_time">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success mt-3 w-100">
                                        <i class="fa fa-save pl-2"></i>
                                        افزودن ترک
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-8">
                @if(!empty($track_info->all()))
                    <div class="table-responsive">
                        <table class="table table-hover table-custom spacing8">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>تصویر ترک</th>
                                <th>عنوان ترک</th>
                                <th>تایم ترک</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $row = (($track_info->currentPage() - 1) * $track_info->perPage() ) + 1;
                            @endphp
                            @foreach($track_info as $track)
                                <tr>
                                    <td class="w60">
                                        <span>{{$row}}</span>
                                    </td>
                                    <td>
                                        <img src="{{asset($track['track_image'])}}" class="track_img">
                                    </td>

                                    <td>
                                        <p class="mb-0">
                                            {{$track['track_title']}}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="mb-0">
                                            {{$track['track_time']}}
                                        </p>
                                    </td>

                                    <td>
                                        <button onclick="removeTrack({{$track['id']}})" class="btn btn-danger" data-toggle="tooltip" title="حذف آلبوم">
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

                        {{$track_info->links()}}
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



