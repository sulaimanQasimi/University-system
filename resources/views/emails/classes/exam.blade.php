@component('mail::message')
#Exam Announcement<br>
Dear, Your are setting in the Exam of {{$exam->subject->name}} at {{ $exam->dates }} {{$exam->time}} {{$exam->classes->name}} Class

Thanks,<br>
{{ config('app.name') }}
@endcomponent
