<div>
{{-- Do your work, then step back. --}}

<!-- general form elements -->
    <div class="d-flex justify-content-center ">
        <div class="card card-primary shadow-none card-navy m-0 p-0 col-md-5">
            <div class="card-header">
                <h3 class="card-title">{{__("page.create",['name'=>trans_choice('menu.user',1)])}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" wire:model.lazy="username" class="form-control" id="username"
                           placeholder="Enter username">
                    @error("username")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <select type="email" wire:model.lazy="role" class="form-control" >
                    <option>Role</option>
                    <option value="1">{{__("role.admin")}}</option>
                        <option value="4">{{__("role.finance")}}</option>
                    <option value="8">{{__("role.recipient")}}</option>
                    </select>

                        @error("role")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" wire:model.lazy="email" class="form-control" id="exampleInputEmail1"
                           placeholder="Enter email"> @error("email")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" wire:model.lazy="password" class="form-control" id="exampleInputPassword1"
                           placeholder="Password">
                    @error("password")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group ">
                    <h6>{{__('property.image')}}</h6>
                    <button class="btn btn-flat btn-outline-warning form-control" onclick="document.getElementById('image').click()">{{__('input.select',['name'=>__('property.image')])}}</button>
                    <input type="file" id="image" style="visibility: hidden" wire:model="image">
                    @error('image')
                    <h6 class="text-danger">{{$message}}</h6>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="button" wire:click="save()" wire:loading.attr="disabled" wire:target="image" class="btn btn-primary">{{__("button.submit")}}</button>
            </div>
        </div></div>
    <!-- /.card -->

</div>
