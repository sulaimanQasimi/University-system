<div>
    {{-- The Master doesn't talk, he acts. --}}

    <textarea wire:model="postTxt" cols="30" id="postTxt" name="postTxt"
              class=" @error('postTxt') is-invalid @enderror"></textarea>

    <x-button wire:click="store()">@lang("SAVE")</x-button>

</div>

<!------------------This component creates by sulaiman Qasimi------------------->
