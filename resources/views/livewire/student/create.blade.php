<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <x-cards.simple title="create student">
        <div class="row">
            <x-input.input name="Name" wire:model.lazy="firstname"></x-input.input>
            <x-input.input name="LAST NAME" wire:model.lazy="lastname"></x-input.input>
            <x-input.select name="COLLEGE" wire:model.lazy="college">
                @forelse($colleges as  $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                    <option>{{__("NOT FOUND")}}</option>
                @endforelse
            </x-input.select>
            <x-input.input name="GRADE" type="number" wire:model.lazy="grade"></x-input.input>


            @if(config('university.student.info'))
                <x-input.input name="FATHER NAME" wire:model.lazy="fathername"></x-input.input>
                <x-input.input name="GRAND  FATHER NAME" wire:model.lazy="grandfathername"></x-input.input>
                <x-input.select name="SEX" wire:model="sex">
                    <option value="M">{{__('MALE')}}</option>
                    <option value="F">{{__('FEMALE')}}</option>
                </x-input.select>
                <x-input.input type="date" name="DATE OF BIRTH" wire:model.lazy="dateofBirth"></x-input.input>
            @endif

            @if(config('university.student.school'))
                <x-input.input name="SCHOOL" wire:model.lazy="school"></x-input.input>
                <x-input.input name="GRADUATION YEAR" wire:model.lazy="year"></x-input.input>
            @endif

            @if(config('university.student.national_exam'))
                <x-input.input name="NATIONAL EXAM ID" wire:model.lazy="kankor"></x-input.input>
            @endif
            @if(config('university.student.image'))
                <x-input.image name="IMAGE" wire:model="image"></x-input.image>
            @endif
            @if(config('university.student.contact'))
                <x-input.input type="tel" name="PHONE" wire:model.lazy="phone"></x-input.input>
            @endif
            @if(config('university.student.address'))
                <x-input.input type="text" name="ADDRESS" wire:model.lazy="address"></x-input.input>
            @endif
            @if(config('university.student.account'))
                <x-input.input type="email" name="EMAIL" wire:model.lazy="email"></x-input.input>
                <x-input.input type="password" name="PASSWORD" wire:model.lazy="password"></x-input.input>
            @endif
        </div>
        <x-button wire:loading.attr="disabled" wire:click="store()">{{__('SAVE')}}</x-button>

    </x-cards.simple>
</div>
