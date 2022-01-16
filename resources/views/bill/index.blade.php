@extends('layouts.advanced_nav')
@section('title',trans_choice('page.show',1,['name'=>trans_choice('menu.bill',2)]))
@section("css")

@endsection
@section('content')
    <livewire:bill />
@endsection
@section('js')
@endsection