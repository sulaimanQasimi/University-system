    <x-layouts.print>
        @component('components.print.header',
        ['department'=>($class)?$class->college->department->name:'',
        'college'=>($class)?$class->college->name:'',
        'title'=>trans("PAYMENT")
        ]
        )
        @endcomponent
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th>@lang('#')</th>
                <th>@lang('NAME')</th>
                <th>@lang('LAST NAME')</th>
                <th>@lang('PAID')</th>
                <th>@lang('REMAIN')</th>
            </tr>
            </thead>
            <tbody>
            @forelse($class->bills as $bill)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$bill->student->firstname}}</td>
                    <td>{{$bill->student->lastname}}</td>
                    <td>{{$bill->paid}}</td>
                    <td>{{$bill->remain}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">@lang("NOT FOUND")</td>
                </tr>
            @endforelse
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
                            <td>${{$class->bills->sum('fee')}}</td>
                        </tr>
                        <tr>
                            <th>@lang("PAID")</th>
                            <td>${{$class->bills->sum('paid')}}</td>
                        </tr>
                        <tr>
                            <th>@lang("REMAIN")</th>
                            <td>${{$class->bills->sum('remain')}}</td>
                        </tr>
                        <tr>
                            <th>@lang("TOTAL")</th>
                            <td>${{$class->bills->sum('paid')}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>

        <x-layouts.footer></x-layouts.footer>


    </x-layouts.print>