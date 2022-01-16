<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <div class="modal-header">
        <h4 class="modal-title">{{__("page.create",['name'=>__("property.file")])}}</h4>

    </div>
    <div class="modal-body">

        <div class="form-group">
            <h6 class="">@lang('property.name')</h6>
            <input type="text" wire:model.lazy="name"
                   class="form-control input-sm   @error('name') is-invalid  @enderror ">
        </div>
        <div class="form-group">
            <h6 class="" for="exampleInputFile">@lang('property.file')</h6>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input  @error('file') is-invalid @enderror" wire:model.lazy="file" id="exampleInputFile">
                    <h6 class=" custom-file-label" for="exampleInputFile">@lang('property.file')</h6>

                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between" wire:loading.remove>
        @error('file')
        <h1>
            {{$message}}
        </h1>
        @enderror
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('button.close')</button>
        <button type="button" class="btn btn-primary" data-fgColor="modal"
                wire:loading.attr="disabled" wire:target="file"
                wire:click="store()">@lang('button.submit')</button>
    </div>

</div>
