<div>
    <x-text.title>{{__("CREATE COLLEGE")}}</x-text.title>
    <div class="row">
        <x-input.input name="COLLEGE" wire:model.lazy="name"></x-input.input>
        <x-input.input name="HEADER"  wire:model.lazy="header"></x-input.input>
    </div>
    <x-button wire:click="store()">{{__("SAVE")}}</x-button>
</div>