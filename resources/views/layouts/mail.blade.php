<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>@yield('title')</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="{{asset('asset.v1/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset.v1/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/bootstrap.rtl.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('css')
    @livewireStyles
    <style>
        .farsi-number {
            font-family: "B Mitra";
        }

        .super-bg {
            /*  background-color: #eec0c6;
              background-image: linear-gradient(315deg,#eec0c6 0%,#7ee8fa 74%);
           background: linear-gradient(to left,#0049ff 34%,#8600c0 74%);*/
        }
    </style>
</head>
<body class="layout-top-nav">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="{{route('dashboard')}}" class="navbar-brand">
                <img src="{{asset('kabul.png')}}" height="80" width="80" alt="Kabul University" class=""
                     style="opacity: .8">
                <span class="brand-text font-weight-light">پوهنتون کابل</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</div>


<div class="pt-5">
    <div class="container-fluid">
        @yield('content')
    </div>


</div>
@livewireScripts
<script src="{{asset('asset.v1/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('asset.v1/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- jQuery UI -->
<script src="{{asset('asset.v1/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('asset.v1/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('asset.v1/dist/js/demo.js')}}"></script>
<script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>

@yield('js')
</body>
</html>
