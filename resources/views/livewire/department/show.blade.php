<div>
    {{-- Be like water. --}}

    @if($department)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>{{__('NAME')}}</th>
                <th>{{__('HEADER')}}</th>
                <th>{{__('ACCOUNT')}}</th>
                <th>{{__('SUB DEPARTMENT')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$department->name}}</td>
                <td>{{$department->header}}</td>
                <td>{{$department->user->email}}</td>
                <td>{{$department->colleges->count()}}</td>
            </tr>
            </tbody>
        </table>
        @can('view',$department)
            <x-tab name="COLLEGE SETTING" color="navy">

                <div class="row">
                    <div class="col-md-6">
                        <livewire:college.create />
                    </div>
                    @can('update',$department)
                        <div class="col-md-6">
                            <x-text.title>{{__("EDIT DEPARTMENT")}}</x-text.title>
                            <div class="row">
                                <x-input.input name="COLLEGE" value="{{$department->name}}"
                                               wire:model.lazy="name"></x-input.input>
                                <x-input.input name="HEADER" value="{{$department->header}}"
                                               wire:model.lazy="header"></x-input.input>
                                <x-input.input name="EMAIL" type="email" value="{{$department->user->email}}"
                                               wire:model.lazy="email"></x-input.input>
                                <x-input.input name="PASSWORD" type="password"
                                               wire:model.lazy="password"></x-input.input>

                            </div>
                            @endcan

                        </div>
                </div>
            </x-tab>
        @endcan
    @endif
</div>

