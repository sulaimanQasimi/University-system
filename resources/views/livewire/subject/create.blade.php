<div>
    <x-text.title>{{__("CREATE SUBJECT")}}</x-text.title>
    <div class="row">
        <x-input.input name="NAME" wire:model.lazy="name"></x-input.input>
        <x-input.input name="GRADE" wire:model.lazy="grade"></x-input.input>
        <x-input.input name="EDITION" wire:model.lazy="edition"></x-input.input>
    </div>
    @if($subject)
        <x-button wire:click="update()">{{__('UPDATE')}}</x-button>
    @else
        <x-button wire:click="store()"  >{{__("SAVE")}}</x-button>
    @endif
</div>