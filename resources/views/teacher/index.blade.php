@extends('layouts.advanced_nav')

@section('title',$teacher->firstname)
@section('content')
    <div class="flex justify-center">
        <livewire:teacher :teacher="$teacher"/>
    </div>
@endsection
@section('js')
@endsection