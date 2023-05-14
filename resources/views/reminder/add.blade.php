@extends('admin.layouts.app')
@section('title')
    Send Notification |
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
                            <h2 class="content-header-title float-left mb-0">Send Notification</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="bs-validation">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Send Notification</h4>
                                </div>
                                <div class="card-body">
                                    <form class="" id="dataForm" role="form"
                                        action="{{ route('reminders.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="col-sm-12">
                                            <div class="box box-primary">
                                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                    <label class="control-label" for="title">Title <span
                                                            class="colorRed"> *</span></label>
                                                    <div class="">
                                                        <input class="form-control" type="text" id="title"
                                                            name="title" placeholder="Title" />
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
                                                        <input class="form-control" type="datetime-local" id="schedule_time"
                                                            name="schedule_time" placeholder="schedule_time"
                                                            min="<?php echo date('Y-m-d H:i'); ?>" />
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
                                                        <div class="box-footer">
                                                            <span class="help-block"> <span class="colorRed"> *</span>
                                                                mentioned fields are mandatory.</span>
                                                            <button type="submit" id="createBtn"
                                                                class="btn btn-primary pull-right"
                                                                style="margin-left: 20px;float:right;">Create</button>
                                                            <button type="button" class="btn btn-info pull-right"
                                                                id="cancelBtn" style="float:right;">Close</button>
                                                        </div>
                                                    </div>
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
@section('css')
    <style>
        .demo-inline-spacing>* {
            margin-top: 0;
        }
    </style>
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
        $(document).ajaxStart(function() {
            Pace.restart();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var SITE_URL = "<?php echo URL::to('/'); ?>";



        $(document.body).on('click', "#createBtn", function() {
            if ($("#dataForm").length) {
                $("#dataForm").validate({
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


        $("#cancelBtn").click(function() {
            window.location.href = "{{ url('reminders') }}";
        });
    </script>
@endsection
