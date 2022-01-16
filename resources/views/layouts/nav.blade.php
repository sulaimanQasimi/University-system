<!doctype html>
<html lang="en" dir="ltr">
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
        .tb-right th,
        .tb-right td{
            text-align: center;
        }
        .myTable{
            display: block;
            height: 200px;
            overflow-y: auto;
        }
        .img-circle:hover{

            transform: scale(1.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
		
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #001f3f linear-gradient(180deg,#26415c,#001f3f) repeat-x!important;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
.header {
  position: fixed;
  top: 0;
  z-index: 1;
  width: 100%;
  background-color: #f1f1f1;
}

/* The progress container (grey background) */
.progress-container {
  width: 100%;
  height: 8px;
  background: #ccc;
}

/* The progress bar (scroll indicator) */
.progress-bar {
  height: 8px;
  background: #001f3f linear-gradient(180deg,#26415c,#001f3f) repeat-x!important;
  width: 0%;
}
    </style>
</head>
<body class="layout-top-nav">
<div class="header">
  <div class="progress-container">
    <div class="progress-bar" id="myBar"></div>
  </div>
</div>

<div class="wrapper">

    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="{{route('dashboard')}}" class="navbar-brand">
                <img src="{{env("APP_LOGO")}}" height="80" width="80" alt="Kabul University" class=""
                     style="opacity: .8">
                <span class="brand-text font-weight-light">{{env("APP_NAME")}}</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link">{{trans_choice('menu.dashboard',1) }} </a>
                    </li>
                    @if(auth()->user()->sub_department !=null)
                        @php($department=auth()->user()->sub_department)
                        <li class="nav-item">
                            <a href="{{route('department.subdepartment.show',[$department->department->id,$department->id])}}" target="_blank"
                               class="nav-link">{{trans_choice('menu.file',1) }} </a>
                        </li>
                    @endif <li class="nav-item">
                        <a href="{{route('download')}}" target="_blank"
                           class="nav-link">{{trans_choice('menu.file',1) }} </a>
                    </li>
                    @if(auth()->user()->teacher !=null)
                        <li class="nav-item">
                            <a href="{{route('teacher.show',auth()->user()->teacher->id)}}" target="_blank"
                               class="nav-link">{{trans_choice('menu.teacher',1)}}</a>
                        </li>
                    @endif
                    @if(auth()->user()->department !=null)
                        <li class="nav-item">
                            <a href="{{route('department.show',auth()->user()->department->id)}}" target="_blank"
                               class="nav-link">{{trans_choice('menu.super_department',1)}}</a>
                        </li>
                    @endif
                    @if(auth()->user()->student !=null)
                        <li class="nav-item">
                            <a href="{{\Illuminate\Support\Facades\URL::signedRoute('student.show',auth()->user()->student->id)}}" target="_blank"
                               class="nav-link">{{trans_choice("menu.student",2)}} @lang("menu.student")</a>
                        </li>
                    @endif
                    @if(auth()->user()->is_admin)
                        <li class="nav-item">
                            <a href="{{route('department')}}" target="_blank"
                               class="nav-link">{{trans_choice('menu.super_department',2)}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('student.index')}}" target="_blank"
                               class="nav-link">{{trans_choice('menu.student',2)}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user')}}" target="_blank"
                               class="nav-link">{{trans_choice('menu.user',2)}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('subject.index')}}" target="_blank"
                               class="nav-link">{{trans_choice('menu.subject',2)}}</a>
                        </li>
                    @endif
                    <li class="nav-item"><a href="#" class="nav-link text-primary">
                            {{__('login.last_login',['time'=>auth()->user()->last_login])}}</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="nav-link dropdown-toggle">{{trans_choice('menu.manage_account',1)}}</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                            <li><a href="{{ route('profile.show') }}"
                                   class="dropdown-item">{{trans_choice('menu.profile',1) }}  </a></li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a onclick="event.preventDefault();

                                   document.getElementById('logout-form').submit();"
                                   class="dropdown-item">{{trans_choice('menu.logout',1) }} </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>


                                <!-- Level two dropdown-->
                                <!-- End Level two -->
                        </ul>
                    </li>
                </ul>
            </div>
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
@stack('scripts')

<script>
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}

</script>
</body>
</html>
