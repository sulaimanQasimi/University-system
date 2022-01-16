@extends('layouts.advanced_nav')
@section('css')

@endsection
@section('content')

    <h1 class="text-center">{{__('new student')}}</h1>
    <form action="{{route('class.student.store',$class->id)}}" method="post">
        @csrf
        <table class="table table-bordered table-head-fixed">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('kankor')}}</th>
                <th>{{ __('name')}}</th>
                <th>{{ __('lastname')}}</th>
                <th>{{ __('fname')}}</th>
                <th>{{ __('gname')}}</th>
                <th>{{ __('grade')}}</th>
                <th>{{ __('sex')}}</th>
                <th>{{ __('year')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($department as $student)
                <tr>
                    <td><input type="checkbox" value="{{$student->id}}" name="student[]"></td>
                    <td>{{$student->kankor_id}}</td>
                    <td>{{$student->firstname}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>{{$student->fathername}}</td>
                    <td>{{$student->grandfathername}}</td>
                    <td>{{$student->grade}}</td>
                    <td>{{$student->sex}}</td>
                    <td>{{$student->year}}</td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>{{ __('kankor')}}</th>
                <th>{{ __('name')}}</th>
                <th>{{ __('lastname')}}</th>
                <th>{{ __('fname')}}</th>
                <th>{{ __('gname')}}</th>
                <th>{{ __('grade')}}</th>
                <th>{{ __('sex')}}</th>
                <th>{{ __('year')}}</th>

            </tr>

            </tfoot>
        </table>

        <h1 class="text-center">{{__('removed student')}}</h1>
        <table class="table table-bordered table-head-fixed">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('kankor')}}</th>
                <th>{{ __('name')}}</th>
                <th>{{ __('lastname')}}</th>
                <th>{{ __('fname')}}</th>
                <th>{{ __('gname')}}</th>
                <th>{{ __('grade')}}</th>
                <th>{{ __('sex')}}</th>
                <th>{{ __('year')}}</th>

            </tr>
            </thead>
            <tbody>
            @foreach($removed as $student)
                <tr>
                    <td><input type="checkbox" value="{{$student->id}}" name="student[]"></td>
                    <td>{{$student->kankor_id}}</td>
                    <td>{{$student->firstname}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>{{$student->fathername}}</td>
                    <td>{{$student->grandfathername}}</td>
                    <td>{{$student->grade}}</td>
                    <td>{{$student->sex}}</td>
                    <td>{{$student->year}}</td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>{{ __('kankor')}}</th>
                <th>{{ __('name')}}</th>
                <th>{{ __('lastname')}}</th>
                <th>{{ __('fname')}}</th>
                <th>{{ __('gname')}}</th>
                <th>{{ __('grade')}}</th>
                <th>{{ __('sex')}}</th>
                <th>{{ __('year')}}</th>
            </tr>

            </tfoot>
        </table>


        <button type="submit" class="btn btn-outline-primary btn-xs">{{__('button.submit')}}</button>
    </form>

@endsection
@section('js')

@endsection