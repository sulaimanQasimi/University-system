<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <input class="form-control @error($attributes->wire('model')->value()) is-invalid @enderror" {{$attributes->merge(['type'=>'text'])}}>
    @error($attributes->wire('model')->value())
    <h6 class="text-danger">{{$message}}</h6>
    @enderror
</div>