<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="col-md-12">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Sorry!</strong> invalid input.<br><br>
                <ul style="list-style-type:none;">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($updateMode)
            @include('livewire.update')
        @else
            @include('livewire.create')
        @endif
        <table id="example2" class="table table-striped table-light table-head-fixed table-valign-middle"
               style="margin-top:20px;">
            <thead>
            <tr>
                <th>NO</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>
                        <button wire:click="edit({{$row->id}})" class="btn btn-sm btnoutline-danger py-0">Edit</button>
                        |
                        <button wire:click="destroy({{$row->id}})" class="btn btn-sm
btn-outline-danger py-0">Delete
                        </button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
