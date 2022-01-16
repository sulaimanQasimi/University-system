@extends('layouts.advanced_nav')
@section('css')

@endsection
@section('title',trans('SHOW STUDENT'))

@section('content')
    <livewire:student.view :profile="$student"/>
@endsection
@section('js')

@endsection