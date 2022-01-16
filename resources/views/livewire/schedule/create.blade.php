<div class="row">
    {{-- The Master doesn't talk, he acts. --}}
    @if($class)
    <x-input.select name="SUBJECT" wire:model="subject">
        @forelse($subjects as $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @empty
            <option>{{__("NOT FOUND")}}</option>
        @endforelse
    </x-input.select>
    <x-input.select name="TEACHER" wire:model="teacher">
        @forelse($teachers as $value)
            <option value="{{$value->id}}">{{$value->firstname}} {{$value->lastname}}</option>
        @empty
            <option>{{__("NOT FOUND")}}</option>
        @endforelse
    </x-input.select>
    <x-input.select name="PERIOD" wire:model="period">
        <option value="1">{{__("FIRST")}}</option>
        <option value="2">{{__("SECOND")}}</option>
        <option value="3">{{__("THIRD")}}</option>
        <option value="4">{{__("FORTH")}}</option>
        <option value="5">{{__("FIFTH")}}</option>
        <option value="6">{{__("SIXTH")}}</option>
    </x-input.select>
    <x-input.select name="DAY" wire:model="day">

        <option value="1">{{__("SATURDAY")}}</option>
        <option value="2">{{__("SUNDAY")}}</option>
        <option value="3">{{__("MONDAY")}}</option>
        <option value="4">{{__("TUESDAY")}}</option>
        <option value="5">{{__("WEDNESDAY")}}</option>
        <option value="6">{{__("THURSDAY")}}</option>
        <option value="7">{{__("FRIDAY")}}</option>

    </x-input.select>
    <x-button wire:click="store">{{__("SAVE")}}</x-button>
@endif
</div>
