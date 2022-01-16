<img src="{{asset(env('HEAD_LOGO'))}}" class="float-left" height="{{config('university.logo.second.height')}}" width="{{config('university.logo.second.width')}}">
<img src="{{asset(env('APP_LOGO'))}}" class="float-right" height="{{config('university.logo.first.height')}}" width="{{config('university.logo.first.width')}}">
<h1 class="text-center">{{env("APP_NAME")}}</h1>
<h2 class="text-center">{{$department}}</h2>
<h3 class="text-center">{{$college}}</h3>
<h4 class="text-center">{{$title}}</h4>
<hr>
<h4 class="float-right headline"><i class="fa fa-calendar text-info"></i> {{now()->format('Y/m/d')}}</h4>