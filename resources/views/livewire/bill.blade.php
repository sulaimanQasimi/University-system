<div>
    {{-- Do your work, then step back. --}}

    <div class="card shadow-lg">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">@lang("BILL")</h3>

            <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">@lang("BILL")</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">@lang("CREATE")</a></li>
            </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    @can('viewAny',\App\Models\Bill::class)
                    <div class="row">
                        <x-input.input type="number" name="year" wire:model="year"></x-input.input>
                        <x-input.select type="number" name="class" wire:model="classroom">
                            @forelse($classrooms as $value)
                                <option value="{{$value->id}}">{{ $value->name }}</option>
                            @empty
                                <option>{{__("NOT FOUND")}}</option>
                            @endforelse
                        </x-input.select>
                    </div>
                        @if($class)
                            <x-button.link target="_blank" href="{{route('print.bill.all',$class->id)}}">
                                @lang("PRINT")
                            </x-button.link>
                        @endif
                        <x-table>

                            <thead>
                            <tr>
                                <td>#</td>
                                <td>@lang("NAME")</td>
                                <td>@lang("FATHER NAME")</td>
                                <td>@lang("ID")</td>
                                <td>@lang("CLASS")</td>
                                <td>@lang("FEE")</td>
                                <td>@lang("PAID")</td>
                                <td>@lang("REMAIN")</td>
                                <th>@lang("PRINT")</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bills as $bill)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$bill->student->firstname}}</td>
                                    <td>{{$bill->student->fathername}}</td>
                                    <td>{{$bill->student->ids}}</td>
                                    <td>{{$bill->classroom->name}}</td>
                                    <td>{{$bill->fee}}</td>
                                    <td>{{$bill->paid}}</td>
                                    <td>{{$bill->remain}}</td>
                                    <td>
                                        <x-button.link target="_blank" href="{{route('print.bill.single',$bill->id)}}">
                                            @lang("PRINT")
                                        </x-button.link>

                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="5"></th>
                                <th>{{$bills->sum('fee')}}</th>
                                <th>{{$bills->sum('paid')}}</th>
                                <th>{{$bills->sum('remain')}}</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </x-table>
                    @endcan
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane " id="tab_2">
                    <livewire:bill.create/>


                </div>
            </div>
            <!-- /.tab-content -->
        </div>

    </div>


</div>
