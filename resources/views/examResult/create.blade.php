@extends('layouts.advanced_nav')
@section('title',__('exam.result'))
@section('content')

    {{--<livewire:department.subdepartment.classes.result.create :exam="$exam">--}}


    <form action="{{route('exam.result.store',$exam->id)}}" method="post">
        @csrf
        <table id="" class="table table-bordered tb-right">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>{{__('property.name')}}</th>
                <th>{{__('property.f_name')}}</th>
                <th>{{__('property.g_name')}}</th>
                <th>{{__('exam.class_activity')}}</th>
                <th>{{__('exam.home_work')}}</th>
                <th>{{__('exam.midterm')}}</th>
                <th>{{__('exam.final')}}</th>

            </tr>
            </thead>
            <tbody>
            @foreach($exam->Examstudents as $student)
                <tr>
                    <td style="width: 10px">{{$loop->iteration}}</td>
                    <td>{{$student->student->firstname}}</td>
                    <td>{{$student->student->fathername}}</td>
                    <td>{{$student->student->grandfathername}}</td>
                    <td><input type="number" name="student[{{$student->id}}][classActivity]]"
                               value="{{$student->classActivity}}" class="form-control"></td>
                    <td><input type="number" name="student[{{$student->id}}][homework]" value="{{$student->homework}}"
                               class="form-control"></td>
                    <td><input type="number" name="student[{{$student->id}}][mid]" value="{{$student->mid}}"
                               class="form-control"></td>
                    <td><input type="number" name="student[{{$student->id}}][final]" value="{{$student->final}}"
                               class="form-control"></td>

                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th style="width: 10px">#</th>
                <th>{{__('property.name')}}</th>
                <th>{{__('property.f_name')}}</th>
                <th>{{__('property.g_name')}}</th>
                <th>{{__('exam.class_activity')}}</th>
                <th>{{__('exam.home_work')}}</th>
                <th>{{__('exam.midterm')}}</th>
                <th>{{__('exam.final')}}</th>

            </tr>
            </tfoot>
        </table>
        <button type="submit" class="btn btn-primary">{{__('button.submit')}}</button>
    </form>



@endsection