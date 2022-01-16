<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div class="row">
        <div class="col-md-3">
            <x-cards.info>
                <div class="card-body box-profile">
                    <ul class="list-group list-group-unbordered mb-3">


                        <x-cards.lists.link name="Name">
                            {{$user->name}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="permation">
                            {{$user->role->roleName}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="email">
                            {{$user->email}}
                        </x-cards.lists.link>
                     @can('update',$user)
                        <x-cards.lists.link name="password">
                            <x-button wire:loading.attr="disabled" wire:loading.class="btn-block btn-danger" wire:click="password()" >@lang('RESET')</x-button>
                        </x-cards.lists.link>
                         @endcan
                    </ul>
                </div>
            </x-cards.info>
        </div>
    </div>
</div>
