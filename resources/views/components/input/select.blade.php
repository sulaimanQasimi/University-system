<div class="form-group {{$column}}">
    <label class="col-form-label">{{ __($name) }}</label>
    <select class="form-control" {{$attributes}}>
        <option selected>{{ __($name) }}</option>
        {{$slot}}
    </select>
    @error($attributes->wire('model')->value())
    <h6 class="text-danger">{{$message}}</h6>
    @enderror
</div>