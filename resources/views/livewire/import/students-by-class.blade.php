<div>
    {{-- The Master doesn't talk, he acts. --}}
    @if($classroom)
        <div class="row">
            <x-input.input name="YEAR" type="number" wire:model.lazy="year"></x-input.input>

                <x-input.select name="CLASS" wire:model="class">
                @forelse($classrooms as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @empty
                    <option>{{__("NOT FOUND")}}</option>
                @endforelse
                </x-input.select>
        </div>
        <x-button wire:click="store()">{{__("SAVE")}}</x-button>
    @endif


</div>
