<div>
    <div id="accordion">
        <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
        <div class="card card-primary text-right">
            <div class="card-header">
                <h4 class="card-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed"
                       aria-expanded="false">
                        {{__('main.edit')}}
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse in collapse" style="">
                <div class="card-body">
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <h6 class="text-right">{{__('component.name')}}</h6>
                                    <input type="text" wire:model.lazy="firstname"
                                           class="form-control input-sm text-right">
                                </div>
                                <div class="form-group">

                                    <h6 class="text-right">{{__('component.fname')}}</h6>
                                    <input type="text" wire:model.lazy="fathername"
                                           class="form-control input-sm text-right">
                                </div>

                                <div class="form-group">
                                    <h6 class="text-right">{{__('component.lastname')}}</h6>
                                    <input type="text" wire:model.lazy="lastname"
                                           class="form-control input-sm text-right">
                                </div>
                                <div class="form-group">
                                    <h6 class="text-right">{{__('component.gname')}}</h6>
                                    <input type="text" wire:model.lazy="grandfathername"
                                           class="form-control input-sm text-right">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h6 class="text-right">{{__('component.dateofBirth')}}</h6>
                                    <input type="date" wire:model.lazy="dateofBirth"
                                           class="form-control input-sm text-right">
                                </div>

                                <div class="form-group">

                                    <h6 class="text-right">{{__('component.email')}}</h6>
                                    <input type="email" wire:model.lazy="email"
                                           class="form-control input-sm text-right">
                                </div>
                                <div class="form-group">

                                    <h6 class="text-right">{{__('component.password')}}</h6>
                                    <input type="password" wire:model.lazy="password"
                                           class="form-control input-sm text-right">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h6 class="text-right">{{__('component.grade')}}</h6>
                                    <input type="text" wire:model.lazy="grade" class="form-control input-sm text-right">
                                </div>
                                <div class="form-group">
                                    <h6 class="text-right">{{__('component.phone')}}</h6>
                                    <input type="tel" wire:model.lazy="phone" class="form-control input-sm text-right">
                                </div>
                                <div class="form-group">
                                    <h6 class="text-right">{{__('component.address')}}</h6>
                                    <input type="text" wire:model.lazy="address"
                                           class="form-control input-sm text-right">
                                </div>

                                <button wire:click="update()" class="btn btn-dark">{{__('main.submit')}}</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>