<x-layouts.print>
@component('components.print.header',
['department'=>($bill->student->last_grade)?$bill->student->last_grade->college->department->name:'',
'college'=>($bill->student->last_grade)?$bill->student->last_grade->college->name:'',
'title'=>trans("PAYMENT")
]
)
@endcomponent
<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>@lang('STUDENT ID')</th>
        <th>@lang('NAME')</th>
        <th>@lang('LAST NAME')</th>
        <th>@lang('FATHER NAME')</th>
        <th>@lang('CLASS')</th>
        <th>@lang('GRADE')</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$bill->student->id}}</td>
        <td>{{$bill->student->firstname}}</td>
        <td>{{$bill->student->lastname}}</td>
        <td>{{$bill->student->fathername}}</td>
    <td>{{$bill->classroom->name}}</td>
        <td>{{$bill->classroom->grade}}</td>
    </tr>
    </tbody>
</table>
<h4 class="text-center">@lang("PAYMENT INFO")</h4>
<div class="row p-5">
    <!-- accepted payments column -->
    <div class="col-6">
        <x-print.payment-method>

        </x-print.payment-method>

    </div>

    <!-- /.col -->
    <div class="col-6">
        <p class="lead">Amount Due to {{$bill->classroom->created_at}}</p>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <th style="width:50%">@lang("FEE")</th>
                    <td>${{$bill->fee}}</td>
                </tr>
                <tr>
                    <th>@lang("PAID")</th>
                    <td>${{$bill->paid}}</td>
                </tr>
                <tr>
                    <th>@lang("REMAIN")</th>
                    <td>${{$bill->remain}}</td>
                </tr>
                <tr>
                    <th>@lang("TOTAL")</th>
                    <td>${{$bill->paid}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.col -->
</div>

<x-layouts.footer></x-layouts.footer>
</x-layouts.print>