@extends('layouts.advanced_nav')
@section('title',trans_choice('menu.dashboard',1) )
@section('css')
    <style>
        @media only screen and (max-width: 768px) {
            #info {
                display: none;
            }
        }
    </style>
@endsection
@section('content')
    {{-- Staticstic--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" id="info">

                <x-cards.info>

                    <ul class="list-group list-group-unbordered mb-3">

                        <x-cards.lists.link name="name">
                            <h6>{{auth()->user()->name}}</h6>
                        </x-cards.lists.link>
                        <x-cards.lists.link name="role">
                            <h6>{{auth()->user()->role->roleName}}</h6>
                        </x-cards.lists.link>
                        <x-cards.lists.link name="email">
                            <a class="float-left" href="mailto:{{auth()->user()->email}}">@lang("EMAIL")</a>
                        </x-cards.lists.link>
                    </ul>
                </x-cards.info>
            </div>
            <div class="col-md-9">
                <!-- /.nav-tabs-custom -->
                <livewire:posts/>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
    </script>

@endsection