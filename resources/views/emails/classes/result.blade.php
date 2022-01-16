@component('mail::message')
    # Result of {{$result->exam->subject->name}} {{$result->exam->dates}} {{$result->exam->time}}

    {{__("exam.home_work")}}:{{$result->homework}}
    {{__("exam.class_activity")}}:{{$result->classActivity}}
    {{__("exam.midterm")}}:{{$result->mid}}
    {{__("exam.final")}}:  {{$result->final}}
    {{__("exam.total")}}: {{$result->total_marks}}
    {{__("exam.result")}}: {{$result->result}}

    Thanks,
    {{ config('app.name') }}
@endcomponent
