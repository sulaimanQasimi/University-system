<div class="btn-group row col-md-12 d-print-none">
    @php($id='complex-'. rand(1, 1000000000))
    @can('update',$model)
        <a href="{{$edit['link']}}" type="button" @isset($edit['blank'])target="_blank"
           @endisset class="btn btn-warning">@lang(\Illuminate\Support\Str::upper(($edit['title'])?$edit['title']:'EDIT'))</a>
    @endcan
    @can('delete',$model)

    <a href="#" type="button" onclick="event.preventDefault();
            document.getElementById('{{$id}}').submit();"
       class="btn btn-warning">@lang(\Illuminate\Support\Str::upper(($delete['title'])?$delete['title']:'delete'))</a>
    <form id="{{$id}}" action="{{ $delete['link'] }}" @isset($delete['blank']) target="_blank" @endisset   method="POST"
          style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endcan
    <button href="#" type="button" onclick="window.print()" class="btn btn-warning">@lang('PRINT')</button>
</div>