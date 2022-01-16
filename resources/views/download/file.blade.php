@extends('layouts.advanced_nav')
@section('css')
@endsection
@section('content')
    <div class="d-flex h-100 w-100 justify-content-center ">
        <div class="card card-navy p-0 m-0 col-md-6">
            <div class="card-header">
                <h6 >{{__('page.show',['name'=>__('property.file')])}}</h6>
            </div>
            <div class="card-body">
                <livewire:downloads />
            </div>


        </div>

    </div>

@endsection
@section('js')

@endsection