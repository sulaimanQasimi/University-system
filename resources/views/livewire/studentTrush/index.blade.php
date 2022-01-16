<div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" wire:model="search" type="text"
                           placeholder="{{__('main.search')}}" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" wire:click="search()">
                            <i class="fas fa-search"></i>
                        </button>

                    </div>
                    <button class="btn btn-navbar" wire:click="createAc()">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
            </div>
            <div wire:poll.30s>
                <div class="col-md-12">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <ul style="list-style-type:none;">

                                @foreach ($errors->all() as $error)
                                    <li class="text-right">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                @if($searchMode==true)
                    @include('livewire.student.list')
                @elseif($createMode==true)
                    @include('livewire.student.edit')
                @elseif($viewMode==true)

                    @include('livewire.student.show')
                @else

                    @include('livewire.student.create')
                @endif
            </div>

        </div>

    </div>
</div>