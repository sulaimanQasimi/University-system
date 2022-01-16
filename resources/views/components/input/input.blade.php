<div class="form-group {{$column}}">
    <!---{{$name}} by Sulaiman Qasimi -->
    <label class="col-form-label">{{__($name)}}</label>
    <input class="form-control @error($attributes->wire('model')->value()) is-invalid @enderror" {{$attributes->merge(['type'=>'text'])}}>
    @error($attributes->wire('model')->value())
    <h6 class="text-danger">{{$message}}</h6>
    @enderror
</div>