@extends('layouts.advanced_nav')
@section('title',__("page.show",['name'=>$user->name]))
@section('content')
    <livewire:user.show :user="$user" />

@endsection
