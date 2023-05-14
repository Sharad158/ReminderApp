<!DOCTYPE html>

<html class="loading @auth {{ auth()->user()->theam_mode }} @endauth" lang="en" data-textdirection="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title> @yield('title') {{ config('app.name', 'Xcash') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ URL::asset('resources/uploads/logo/fav.png') }}" />
    @include('admin.layouts.css')
    @yield('css')


</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">
    <!-- BEGIN: Header-->
    @include('admin.layouts.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    {{-- @include('admin.layouts.sidebar') --}}
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('admin.layouts.footer')

    @include('admin.layouts.js')
    @yield('script')
</body>

</html>
