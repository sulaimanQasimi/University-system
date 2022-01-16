<div class="col-md-12">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @if($college)
        <x-table>
            <thead>
            <tr>
                <th>{{__('COLLEGE')}}</th>
                <th>{{__('HEADER')}}</th>
                <th>{{__('ACCOUNT')}}</th>
                <th>{{__('STUDENT')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$college->name}}</td>
                <td>{{$college->header}}</td>
                <td>{{$college->user->email}}</td>
                <td>{{$college->students->count()}}</td>
            </tr>
            </tbody>

        </x-table>
        @can('view',$college)
            <x-tab name="COLLEGE SETTING">

                <div class="row">
                    <div class="col-md-6">
                        <livewire:classroom.create/>
                    </div>
                    <div class="col-md-6">
                        <x-text.title>{{__("EDIT COLLEGE")}}</x-text.title>
                        <div class="row">
                            <x-input.input name="COLLEGE" value="{{$college->name}}"
                                           wire:model.lazy="name"></x-input.input>
                            <x-input.input name="HEADER" value="{{$college->header}}"
                                           wire:model.lazy="header"></x-input.input>
                            <x-input.input name="EMAIL" type="email" value="{{$college->user->email}}"
                                           wire:model.lazy="email"></x-input.input>
                            <x-input.input name="PASSWORD" type="password" wire:model.lazy="password"></x-input.input>

                        </div>

                    </div>
                </div>


            </x-tab>
        @endcan
        <div class="row">
            <div class="col-md-6">
                <input type="number" class="form-control" wire:model.lazy="year">
            </div>
            <div class="col-md-6">
                <select class="form-control" wire:model="class">
                    <option>{{__("CLASS")}}</option>
                    @forelse($classes as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @empty
                        <option>{{__("NOT FOUND")}}</option>
                    @endforelse
                </select>
            </div>

            <livewire:department.college.classroom/>
        </div>
    @endif
</div>
