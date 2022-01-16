<div>

    <x-cards.simple title="Subject">

    <div class="row">
        <div class="col-md-6">
            <x-table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('NAME')}}</th>
                    <th>{{__('GRADE')}}</th>
                    <th>{{__('EDITION')}}</th>
                    <th>{{__('EDIT')}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($subjects as $row)

                    @if($subject)
                        @if($subject->id== $row->id)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <x-input.inline wire:model.lazy="name"></x-input.inline>

                                </td>
                                <td>
                                    <x-input.inline wire:model.lazy="grade"></x-input.inline>
                                </td>
                                <td>
                                    <x-input.inline wire:model.lazy="edition"></x-input.inline>
                                </td>
                                <td>
                                    <x-button wire:click="update()">{{__('UPDATE')}}</x-button>
                                </td>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->grade}}</td>
                            <td>{{$row->edition}}</td>
                            <td>
                                <x-button wire:click="edit({{$row->id}})">{{__('EDIT')}}</x-button>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </x-table>
        </div>
        <div class="col-md-6">
            @include('livewire.subject.create')
        </div>
    </div>
    </x-cards.simple>
</div>
