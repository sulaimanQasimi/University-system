@extends('layouts.advanced_nav')
@section('title',trans_choice('menu.sub_department',2))
@section('content')
    <livewire:department.subdepartment.show :department="$department">

@endsection