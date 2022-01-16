<div class="col-md-6">
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    <div class="form-group ">
        <h6>{{__($name)}}</h6>
        <button class="btn btn-flat btn-outline-warning form-control"
                onclick="document.getElementById('{!! $id !!}').click()">{{__($name)}}</button>
        <input type="file" id="{{$id}}" style="visibility: hidden" {{$attributes}}>
        @error($attributes->wire('model')->value())
        <h6 class="text-danger">{{$message}}</h6>
        @enderror
    </div>
</div>