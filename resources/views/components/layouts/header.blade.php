<nav class="main-header navbar navbar-expand navbar-white">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item dropdown">

            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{__("MANAGE ACCOUNT")}}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                <li><a href="{{ route('profile.show') }}"
                       class="dropdown-item">{{__('PROFILE') }}  </a></li>
                <li class="dropdown-divider"></li>
                <li>
                    <a onclick="event.preventDefault();

                                   document.getElementById('logout-form').submit();"
                       class="dropdown-item">{{__("LOGOUT") }} </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
            </ul>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item d-none d-sm-inline-block">
            <h6 class="text-dark">
               <i class="badge badge-info"> {{__('LAST LOGIN')}}:{{auth()->user()->last_login}}</i></h6>
        </li>
    </ul>
</nav>

<!------------------This element creates by sulaiman Qasimi------------------->