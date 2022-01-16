<div>
    @can('create',\App\Models\Bill::class)
        <div class="row">
            <x-input.input type="number" name="year" wire:model="year"></x-input.input>
            <x-input.select type="number" name="class" wire:model="classroom">
                @forelse($classrooms as $value)
                    <option value="{{$value->id}}">{{ $value->name }}</option>
                @empty
                    <option>{{__("NOT FOUND")}}</option>
                @endforelse
            </x-input.select>
            <x-input.input type="number" name="fee" wire:model="fee"></x-input.input>
            <x-input.input type="number" name="paid" wire:model="paid"></x-input.input>
            <x-input.input type="number" name="remain" wire:model="remain"></x-input.input>

        </div>
        <x-table>
            <thead>
            <tr>
                <th class="text-dark">#</th>
                <th class="text-dark">@lang('NAME')</th>
                <th class="text-dark">@lang("FATHER NAME")</th>
                <th class="text-dark">@lang("GRAND FATHER NAME")</th>
                <th class="text-dark">@lang("DATE OF BIRTH")</th>
                <th class="text-dark">@lang("PHONE")</th>
                <th class="text-dark">@lang("SELECT")</th>
            </tr>
            </thead>
            <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->firstname}}</td>
                    <td>{{$student->fathername}}</td>
                    <td>{{$student->grandfathername}}</td>
                    <td>{{$student->dateofbirth}}</td>
                    <td>{{$student->phone}}</td>
                    <td>
                        <x-button wire:click="getStudent({{$student->id}})">@lang("SELECT")</x-button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">@lang("NOT FOUND")</td>
                </tr>
            @endforelse
        </x-table>
        <x-input.error name="student"></x-input.error>
        <x-button type="button" wire:click="save()">@lang("SAVE")</x-button>
        @if($bill_url)
            <x-button.link target="_blank" href="{{route('print.bill.single',$bill_url)}}" wire:click="$refresh()">
                @lang("PRINT")
            </x-button.link>
        @endif
    @endcan
</div>

<!------------------This component creates by sulaiman Qasimi------------------->
