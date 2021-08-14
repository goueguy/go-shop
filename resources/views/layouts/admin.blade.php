<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link href="{{asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        <link href="{{asset('assets/build/css/custom.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
        @yield('style')

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                @include('layouts.includes._sidebar')
                <!-- top navigation -->
                @include('layouts.includes._top-nav')
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    @yield('content')
                </div>
                <!-- /page content -->
                <!-- footer content -->
                @include('layouts.includes._footer')
                <!-- /footer content -->
            </div>
        </div>
        @include('layouts.includes._scripts')
    </body>
</html>
