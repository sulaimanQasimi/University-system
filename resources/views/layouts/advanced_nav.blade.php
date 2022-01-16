<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset.v1/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/template.css')}}">

    @yield('css')
    @livewireStyles
</head>
<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-layouts.header></x-layouts.header>
    <x-layouts.menu></x-layouts.menu>
    <x-layouts.main>
        @yield('content')
    </x-layouts.main>
    <x-layouts.footer></x-layouts.footer>

</div>
<script src="{{asset('asset.v1/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('asset.v1/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('asset.v1/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('asset.v1/dist/js/alpine.min.js')}}"></script>

@livewireScripts
@yield('js')
@stack('js')

</body>
</html>
