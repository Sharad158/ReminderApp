@section('title')
    Send Notification |
@endsection
@extends('admin.layouts.app')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0" style="margin-left: -130px;">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Notification List </h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item active">Notification List
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="">
                    <div class="row">
                        <div class="col-sm-12 pull-right  " style="padding-bottom: 10px;">
                            <a href="{{ route('reminders.create') }}" class="float-right">
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light">New
                                    Notification</button>
                            </a>
                        </div>
                        <div class="clear-fix"></div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-datatable datatable-row-remove">
                                    {!! $html->table(['class' => 'table  dt-complex-header table-bordered', 'id' => 'UserDataTable']) !!}
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
    {!! $html->scripts() !!}
    @if (Session::has('message'))
        <script>
            $(function() {
                toastr.{{ Session::get('alert-class') }}('{{ Session::get('message') }}');
            });
        </script>
    @endif

    <script>
        var SITE_URL = "<?php echo URL::to('/'); ?>";
        // change user Status
        $(document.body).on('click', '.actStatus', function(event) {
            var row = this.id;
            var dbid = $(this).attr('data-sid');
            bootbox.confirm({
                message: "Are you sure you want to change user status ?",
                buttons: {
                    'cancel': {
                        label: 'No',
                        className: 'btn-danger'
                    },
                    'confirm': {
                        label: 'Yes',
                        className: 'btn-success'
                    }
                },
                callback: function(result) {
                    if (result) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                id: dbid,
                                _token: '{{ csrf_token() }}'
                            },
                            url: 'reminders/status-change',
                            success: function(response) {
                                if (response == 'Active') {
                                    $('#' + row + '').text('Active').removeClass(
                                        'text-danger').addClass('text-green');
                                } else if (response == 'Deactive') {
                                    $('#' + row + '').text('Deactive').removeClass(
                                        'text-green').addClass('text-danger');
                                } else if (response == 'error') {
                                    bootbox.alert('Something Went to Wrong');
                                }
                            }
                        });
                    }
                }
            });
        });

        function deleteConfirm(id) {
            bootbox.confirm({
                message: "Are you sure you want to delete ?",
                buttons: {
                    'cancel': {
                        label: 'No',
                        className: 'btn-danger'
                    },
                    'confirm': {
                        label: 'Yes',
                        className: 'btn-success'
                    }
                },
                callback: function(result) {
                    if (result) {
                        $.ajax({
                            url: SITE_URL + '/reminders/' + id,
                            type: "DELETE",
                            cache: false,
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data, textStatus, xhr) {
                                if (data == true && textStatus == 'success' && xhr.status ==
                                    '200') {
                                    toastr.warning('Notification Deleted !!');
                                    $('#UserDataTable').DataTable().ajax.reload(null, false);
                                } else {
                                    toastr.error(data);
                                }
                            }
                        });
                    }
                }
            });
        }
    </script>
@endsection
