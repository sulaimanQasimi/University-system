{{--@component('mail::message')--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}
{{--@endcomponent--}}


@component('mail::panel')
    Class Schedule Of {{$class->name}}
@endcomponent
@component('mail::table',['class'=>"text-left"])
    <table style="text-align: center">
        <thead>
        <tr>
            <th>{{trans_choice('menu.subject',2)}}</th>
            <th>{{trans_choice('menu.teacher',2)}}</th>
            <th>@lang('schedule.period')</th>
            <th>@lang('date.day')</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        @foreach($class->classSchedules()->orderBy('day','asc')->get() as $schedule)
            <tr>
                <td>{{$schedule->subject->name}}</td>
                <td>{{$schedule->teacher->firstname}}</td>
                <td>{{$schedule->period}}</td>
                @switch($schedule->day)
                    @case(1)
                    <td>{{__("date.saturday")}}</td>
                    @break
                    @case(2)
                    <td>{{__("date.sunday")}}</td>
                    @break
                    @case(3)
                    <td> {{__("date.monday")}}</td>
                    @break
                    @case(4)
                    <td> {{__("date.tuesday")}}</td>
                    @break
                    @case(5)
                    <td>{{__("date.wednesday")}}</td>
                    @break
                    @case(6)
                    <td> {{__("date.thursday")}}</td>
                    @break
                    @case(7)
                    <td> {{__("date.friday")}}</td>
                    @break
                @endswitch
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>{{trans_choice('menu.subject',2)}}</th>
            <th>{{trans_choice('menu.teacher',2)}}</th>
            <th>@lang('schedule.period')</th>
            <th>@lang('date.day')</th>
        </tr>
        </tfoot>
    </table>

@endcomponent
