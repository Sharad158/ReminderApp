@extends('admin.layouts.app')
@section('title')
    Notification Details |
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
                            <h2 class="content-header-title float-left mb-0">Notification Details</h2>
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
                                    <div class="table-responsive">
                                        <table class="table table-user-information tbl-two-td">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Title</strong></td>
                                                    <td class="text-primary">{{ $user->title }}</td>
                                                </tr>

                                                <tr>
                                                    <td><strong>Description</strong></td>
                                                    <td class="text-primary"> <?php echo $user->description; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Date Time</strong></td>
                                                    <td class="text-primary">
                                                        {{ App\Helper\GlobalHelper::getFormattedDate($user->created_at) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Scaned At</strong></td>
                                                    <td class="text-primary">
                                                        {{ App\Helper\GlobalHelper::getFormattedDate($user->created_at) }}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <div class="col-sm-12">
                                            <div class="" style="border-top:0">
                                                <div class="box-footer">
                                                    <a type="" href="{{ url('/reminders') }}" id="cancelBtn"
                                                        class="btn btn-primary pull-right">
                                                        Back
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
