@extends('layouts.advanced_nav')
@section('css')
    @endsection
@section("title",__('page.show',['name'=>trans_choice('menu.super_department',1)]))
@section('content')
    <livewire:department.show :department="$department"/>
@endsection
@section('js')


@endsection