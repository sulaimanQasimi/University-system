<div>
    <x-text.title>{{__("UPDATE SUBJECT")}}</x-text.title>
    <div class="row">
        <x-input.input name="NAME" wire:model.lazy="name"></x-input.input>
    <x-input.input name="GRADE" wire:model.lazy="grade"></x-input.input>
    <x-input.input name="EDITION" wire:model.lazy="edition"></x-input.input>
</div>
    <x-button wire:click="update()">{{__("SAVE")}}</x-button>
    <x-button wire:click="update()">{{__("SAVE")}}</x-button>
</div>