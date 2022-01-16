@extends('layouts.advanced_nav')
@section('title',__("page.create",['name'=>trans_choice('menu.user',2)]))
    {{--@endsection--}}
@section('content')
    <livewire:user.create>

@endsection
