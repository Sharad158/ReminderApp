@extends('admin.layouts.app')
@section('title')
    Update Notification |
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0" style="margin-left: -130px;">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Update Notification</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="bs-validation">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal" id="notificationForm"
                                        action="{{ route('reminders.update', $user->reminder_notification_id) }}"
                                        method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf

                                        <div class="row">
                                            {{-- <div class="col-sm-6">
                                                <input type="hidden" id="user_id" name="user_id"
                                                    value="{{ $user->id }}" />
                                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class=" control-label" for="name">Name <span
                                                            class="colorRed"> *</span></label>
                                                    <div class=" jointbox">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Name"
                                                            value="@if (!empty(old('first_name'))) {{ old('first_name') }}@else{{ $user->first_name }} @endif" />
                                                        @if ($errors->has('first_name'))
                                                            <span class="help-block alert alert-danger">
                                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-sm-12">
                                                <div class="box box-primary">
                                                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                        <label class="control-label" for="title">Title <span
                                                                class="colorRed"> *</span></label>
                                                        <div class="">
                                                            <input class="form-control" type="text" id="title"
                                                                name="title" placeholder="Title"
                                                                value="@if (!empty(old('title'))) {{ old('title') }}@else{{ $user->title }} @endif" />
                                                            @if ($errors->has('title'))
                                                                <span class="help-block alert alert-danger">
                                                                    <strong>{{ $errors->first('title') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class=" control-label" for="description">Description
                                                            <span class="colorRed"> *</span></label>
                                                        <div class="">
                                                            <textarea class="form-control" id="description" name="description">
                                                        @if (isset($user))
@if (!empty(old('description')))
{{ old('description') }}@else{{ $user->description }}
@endif
@endif
                                                        </textarea>
                                                            @if ($errors->has('description'))
                                                                <span class="help-block alert alert-danger">
                                                                    <strong>{{ $errors->first('description') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group {{ $errors->has('schedule_time') ? ' has-error' : '' }}">
                                                        <label class="control-label" for="schedule_time">Schedule Time <span
                                                                class="colorRed"> *</span></label>
                                                        <div class="">
                                                            <input class="form-control" type="datetime-local"
                                                                id="schedule_time" name="schedule_time"
                                                                placeholder="schedule_time" min="<?php echo date('Y-m-d H:i'); ?>"
                                                                value="{{ \Carbon\Carbon::parse($user->schedule_time)->format('Y-m-d h:i:s') }}" />
                                                            @if ($errors->has('schedule_time'))
                                                                <span class="help-block alert alert-danger">
                                                                    <strong>{{ $errors->first('schedule_time') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="" style="border-top:0">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="" style="border-top:0">
                                                    <div class="box-footer">
                                                        <span class="help-block"> <span class="colorRed"> *</span>
                                                            mentioned fields are mandatory.</span>
                                                        <button type="submit" id="updateBtn"
                                                            class="btn btn-primary pull-right"
                                                            style="margin-left: 20px;float:right;">Update</button>
                                                        <button type="button" class="btn btn-info pull-right"
                                                            id="cancelBtn" style="float:right;">Back</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @if (Session::has('message'))
        <script>
            $(function() {
                toastr.{{ Session::get('alert-class') }}('{{ Session::get('message') }}');
            });
        </script>
    @endif
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script>
        $(function() {
            CKEDITOR.replace('description');
        });
    </script>
    <script>
        $("#cancelBtn").click(function() {
            window.location.href = "{{ url('reminders') }}";
        });
        $(document).ajaxStart(function() {
            Pace.restart();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document.body).on('click', "#updateBtn", function() {
            var id = "{{ $user->id }}";
            if ($("#notificationForm").length) {
                $("#notificationForm").validate({
                    errorElement: 'span',
                    errorClass: 'text-red text-danger',
                    ignore: [],
                    rules: {
                        "title": {
                            required: true,
                        },
                        "description": {
                            required: true,
                        },
                        "schedule_time": {
                            required: true,
                        }
                    },
                    messages: {

                        "title": {
                            required: "Please Enter Notification Title.",
                        },
                        "description": {
                            required: "Please Enter Notification Description.",
                        },
                        "schedule_time": {
                            required: "Please Select Notification Schedule Time.",
                        },
                    },
                    errorPlacement: function(error, element) {
                        if (element.is('select')) {
                            error.appendTo(element.closest("div"));
                        } else {
                            error.insertAfter(element.closest(".form-control"));
                        }
                    },
                });
            }
        });
    </script>
@endsection
