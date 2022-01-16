<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @if($classroom)
        <x-input.input name="STUDENT ID" wire:model.lazy="student" type="number"></x-input.input>
        <x-button wire:click="store()">{{__("SAVE")}}</x-button>
    @endif
</div>
