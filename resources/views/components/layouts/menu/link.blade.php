<li class="nav-item">
    <!----------- THIS {{$name}} CREATED BY SULAIMAN QASIMI---------------->
    <a href="{{route($route)}}" target="_blank" class="nav-link @if(\Illuminate\Support\Facades\URL::current()==route($route)) active  @endif">
        <i class="nav-icon fas fa-{{$icon}}"></i>
        <p>
            {{__($name)}}
        </p>
    </a>
</li>