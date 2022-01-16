@extends('layouts.advanced_nav')@section('title',trans('EDIT STUDENT'))

@section('title',trans('EDIT STUDENT'))
@section('css')
@endsection
@section('content')
    <livewire:student.edit :student="$student"/>
@endsection
@section('js')

@endsection