<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <x-text.title>{{__("CREATE CLASS")}}</x-text.title>
    @if($college)
        <div class="row">
            <x-input.input name="NAME" wire:model.lazy="name"></x-input.input>
            <x-input.input name="GRADE" wire:model.lazy="grade"></x-input.input>
            <x-input.select name="SHIFT" wire:model="shift" column="col-md-12">
                <option value="{{__("MORNING")}}">{{__("MORNING")}}</option>
                <option value="{{__("AFTERNOON")}}">{{__("AFTERNOON")}}</option>
                <option value="{{__("NIGHT")}}">{{__("NIGHT")}}</option>
            </x-input.select>
        </div>

        <x-button wire:click="store()">{{__("SAVE")}}</x-button>
    @endif
</div>
