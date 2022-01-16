<div>
    @if($class)
        <div class="row">

            <x-input.select name="SUBJECT" wire:model.lazy="subject">

                @forelse($subjects as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @empty
                    <option>{{__("NOT FOUND")}}</option>
                @endforelse

            </x-input.select>
            <x-input.select name="TEACHER" wire:model.lazy="teacher">
                @forelse($teachers as $value)
                    <option value="{{$value->id}}">{{$value->firstname}}</option>
                @empty
                    <option>{{__("NOT FOUND")}}</option>
                @endforelse

            </x-input.select>
            <x-input.input type="number" name="NUMBER OF QUESTION" wire:model.lazy="question"></x-input.input>
            <x-input.input type="number" name="MARK PER QUESTION" wire:model.lazy="mark"></x-input.input>
            <x-input.input type="number" name="SUCCESS MARK" wire:model.lazy="success"></x-input.input>
            <x-input.input type="date"   name="DATE" wire:model.lazy="date"></x-input.input>
            <x-input.input type="date"   name="RESULT" wire:model.lazy="result"></x-input.input>

        </div>
        <x-button class="btn btn-app" wire:click="store">{{__("SAVE")}}</x-button>
    @endif
</div>
