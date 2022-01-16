<div>
    <x-cards.simple title="create teacher">
    <div class="row">
        <x-input.input name="Name" wire:model.lazy="firstname"></x-input.input>
        <x-input.input name="last name" wire:model.lazy="lastname"></x-input.input>
        <x-input.select name="college" wire:model.lazy="college">
            @forelse($colleges as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @empty
                <option>{{__("NOT FOUND")}}</option>
            @endforelse
        </x-input.select>

        @if(config('university.teacher.info'))
            <x-input.input name="father name" wire:model.lazy="fathername"></x-input.input>
            <x-input.input type="date" name="date of birth" wire:model.lazy="dateofbirth"></x-input.input>
            <x-input.select name="sex" wire:model.lazy="sex">
                <option value="M">{{__('MALE')}}</option>
                <option value="F">{{__('FEMALE')}}</option>
            </x-input.select>

            <x-input.input name="field" wire:model.lazy="field"></x-input.input>
            <x-input.input type="number" name="experience" wire:model.lazy="experience"></x-input.input>

            <x-input.input type="number" name="salary" wire:model.lazy="salary"></x-input.input>@endif
        @if(config('university.teacher.image'))
            <x-input.image wire:model="image"></x-input.image>
        @endif
        @if(config('university.teacher.contact'))
            <x-input.input type="tel" name="phone" wire:model.lazy="phone"></x-input.input>
        @endif
        @if(config('university.teacher.address'))
            <x-input.input name="address" wire:model.lazy="address"></x-input.input>
        @endif
        @if(config('university.teacher.account'))
            <x-input.input name="email" wire:model.lazy="email"></x-input.input>
            <x-input.input name="password" wire:model.lazy="password"></x-input.input>
        @endif


    </div>
    <x-button wire:click="store()">{{__("SAVE")}}</x-button>
    </x-cards.simple>
</div>
