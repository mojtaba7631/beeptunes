@extends('layouts.admin_layout')

@section('Title')
    پنل مدیریت | رویدادها
@endsection

@section('custom-js')
    <script>
        function removeEvent(id) {
            var removeModal = $("#RemoveModal");
            var action = "/panel/events_delete_panel/" + id;
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
                    <h1>رویدادها</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">رویدادها</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="{{route('admin.events_create_panel')}}" class="btn btn-sm btn-success">
                        <i class="fa fa-plus mr-2"></i>
                        افزودن رویداد جدید
                    </a>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                @if(!empty($event_info->all()))
                    <div class="table-responsive">
                        <table class="table table-hover table-custom spacing8">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان رویداد</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $row = (($event_info->currentPage() - 1) * $event_info->perPage() ) + 1;
                            @endphp
                            @foreach($event_info as $event)
                                <tr>
                                    <td class="w60">
                                        <span>{{$row}}</span>
                                    </td>
                                    <td>
                                        <p class="mb-0">
                                            {{$event['event_title']}}
                                        </p>
                                    </td>

                                    <td>
                                        @if($event['main'] == 0)
                                        <a href="{{route('admin.events_main_panel', ['event_id' => $event['id']])}}">
                                            <button class="btn btn-warning" data-toggle="tooltip" title="فعال در صفحه اصلی">
                                                <i class="icon-check"></i>
                                            </button>
                                        </a>
                                        @elseif ($event['main'] == 1)
                                            <a href="{{route('admin.events_main_panel', ['event_id' => $event['id']])}}">
                                                <button class="btn btn-success" data-toggle="tooltip" title="فعال در صفحه اصلی">
                                                    <i class="icon-check"></i>
                                                </button>
                                            </a>
                                        @endif

                                        <a href="{{route('admin.events_edit_panel', ['event_id' => $event['id']])}}">
                                            <button class="btn btn-primary" data-toggle="tooltip" title="ویرایش رویداد">
                                                <i class="icon-pencil"></i>
                                            </button>
                                        </a>

                                        <button onclick="removeEvent({{$event['id']}})" class="btn btn-danger" data-toggle="tooltip" title="حذف رویداد">
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

                        {{$event_info->links()}}
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
                    <h4 class="modal-title">حذف رویداد</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="alert alert-danger">
                        آیا از حذف رویداد اطمینان دارید؟
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

