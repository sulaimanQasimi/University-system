<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="input-group mb-3">
        <!-- /btn-group -->
        <div class="row ">
            <div class="col-md-3">
                <h6>{{trans_choice('date.year',1)}}</h6>
                <input type="number" wire:model="year" min="2020" max="3000" class="text-right @error('year') is-invalid @enderror form-control">
            </div>
            <div class="col-md-3">
                <h6>{{trans_choice('date.month',1)}}</h6>
                <input type="number" wire:model="month" min="1" max="12"     class="text-right @error('month') is-invalid @enderror form-control">
            </div>
            <div class="col-md-3">
                <h6>{{trans_choice('date.day',1)}}</h6>
                <input type="number" wire:model="day" min="1" max="31"       class="text-right @error('day') is-invalid @enderror form-control">
            </div>
            <div class="col-md-3 p-4">
                <button class="btn btn-outline-primary" wire:click="search()"  wire:click="refresh" {{--wire:click="$emit('ScheduleUpdate',{{$update}})"--}}
                wire:loading.attr="disabled">{{__('button.search')}}</button>
            </div>
        </div>
    </div>
        <livewire:teacher.schedule.show :teacher="$teacher">

</div>
