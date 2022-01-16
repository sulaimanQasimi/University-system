@extends('layouts.advanced_nav')
@section('title',trans_choice('page.create',1,['name'=>__('menu.super_department')]))
@section('css')


@endsection
@section('content')

    <livewire:department.create />
@endsection