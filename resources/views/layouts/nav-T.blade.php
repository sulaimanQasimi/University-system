<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('css')
    @livewireStyles
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
                <img src="{{asset('kabul.png')}}" height="80" width="80" alt="Kabul University" class=""
                     style="opacity: .8">
                <span class="brand-text font-weight-light">پوهنتون کابل</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link">{{__('main.dashboard')}}</a>
                    </li>
                    @if(auth()->user()->sub_department !=null)
                        @php($department=auth()->user()->sub_department)
                        <li class="nav-item">
                            <a href="{{route('department.subdepartment.show',[$department->department->id,$department->id])}}" target="_blank"
                               class="nav-link">{{__('main.subDepartment')}}</a>
                        </li>
                    @endif <li class="nav-item">
                        <a href="{{route('download')}}" target="_blank"
                           class="nav-link">{{__('component.file')}}</a>
                    </li>
                    @if(auth()->user()->teacher !=null)
                        <li class="nav-item">
                            <a href="{{route('teacher.show',auth()->user()->teacher->id)}}" target="_blank"
                               class="nav-link">{{__('main.teacher')}}</a>
                        </li>
                    @endif
                    @if(auth()->user()->department !=null)
                        <li class="nav-item">
                            <a href="{{route('department.show',auth()->user()->department->id)}}" target="_blank"
                               class="nav-link">{{__('main.superDepartment')}}</a>
                        </li>
                    @endif
                    @if(auth()->user()->student !=null)
                        <li class="nav-item">
                            <a href="{{route('student.show',auth()->user()->student->id)}}" target="_blank"
                               class="nav-link">{{__('main.student')}}</a>
                        </li>
                    @endif
                    @if(auth()->user()->is_admin)
                        <li class="nav-item">
                            <a href="{{route('department')}}" target="_blank"
                               class="nav-link">{{__('main.superDepartment')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('student.index')}}" target="_blank"
                               class="nav-link">{{__('main.student')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user')}}" target="_blank"
                               class="nav-link">{{__('main.user')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('subject.index')}}" target="_blank"
                               class="nav-link">{{__('component.subject')}}</a>
                        </li>
                    @endif


                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="nav-link dropdown-toggle">{{__('component.Manage Account')}}</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                            <li><a href="{{ route('profile.show') }}"
                                   class="dropdown-item">{{ __('component.Profile') }} </a></li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a onclick="event.preventDefault();

                                   document.getElementById('logout-form').submit();"
                                   class="dropdown-item">{{ __('component.Log Out') }} </a>
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

@yield('js')
@stack('scripts')


<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
