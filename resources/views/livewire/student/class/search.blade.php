<div>

    <h6>{{__("page.show",['name'=>trans_choice('menu.class',1)])}}</h6>
    <select class="form-control custom-select" wire:model="search">
        <option value="">{{__("input.select",['name'=>trans_choice('menu.class',1)])}}</option>
        @foreach($class as $cl)
        <option value="{{$cl->classroom->id}}">{{$cl->classroom->name}}</option>
        @endforeach
    </select>
    <div wire:loading wire:target="search">
        <center class="text-bold pt-2 text-center">Loading</center>
    </div>

</div>
