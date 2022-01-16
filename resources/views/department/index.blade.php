@extends('layouts.advanced_nav')

@section('title',trans_choice('page.show',1,['name'=>__('menu.super_department')]))
@section('css')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
    <livewire:departments />
@endsection
@section('js')

    <!-- Select2 -->
    <script src="{{asset('asset.v1/plugins/select2/js/select2.full.min.js')}}"></script>

@endsection