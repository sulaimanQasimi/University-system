<div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">
    <div class="card card-primary shadow-xl rounded">
        <div class="card-header">
            <h4 class="card-title"> {{trans_choice('page.create',1,['name'=>trans_choice('menu.super_department',1)])}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <h6>{{__('property.name')}}</h6>
                <input type="text" wire:model="name" class="form-control form input-sm @error('name') is-invalid @enderror">
                @error('name')
                <h6 class="text-danger">{{$message}}</h6>
                @enderror
            </div>
            <div class="form-group">
                <h6>{{__('property.header')}}</h6>
                <input type="text" wire:model="header" class="form-control input-sm @error('header') is-invalid @enderror">
                @error('header')
                <h6 class="text-danger">{{$message}}</h6>
                @enderror
            </div>
            <div class="form-group">
                <h6>{{__('property.phone')}}</h6>
                <input type="text" wire:model="phone" class="form-control input-sm @error('phone') is-invalid @enderror">
                @error('phone')
                <h6 class="text-danger">{{$message}}</h6>
                @enderror
            </div>
            <div class="form-group">
                <h6>{{__('property.email')}}</h6>
                <input type="email" wire:model="email" class="form-control input-sm @error('phone') is-invalid @enderror">
            </div>
            <div class="form-group">
                <h6>{{__('property.password')}}</h6>
                <input type="password" wire:model="password" class="form-control input-sm @error('phone') is-invalid @enderror">
                @error('password')
                <h6 class="text-danger">{{$message}}</h6>
                @enderror
            </div>
            <button wire:click="store()" wire:loading.attr="disabled" class="btn btn-dark btn-sm">{{__('button.submit')}}</button>
        </div>

    </div>
</div>
