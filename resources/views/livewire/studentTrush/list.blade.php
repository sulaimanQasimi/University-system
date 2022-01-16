<div>
    <table id="example2"
           class="table table-striped table-responsive-xl table-dark table-head-fixed table-valign-middle">
        <thead>
        <tr>
            <th style="width:10px">{{__('component.id')}}</th>
            <th>{{__('component.name')}}</th>
            <th>{{__('component.fname')}}</th>
            <th>{{__('component.dateofBirth')}}</th>
            <th>{{__('component.phone')}}</th>
            <th>{{__('component.address')}}</th>
            <th>{{__('component.fee')}}</th>
            <th>{{__('component.paid')}}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td style="width:10px;">{{$student->id}}</td>
                <td>{{$student->firstname}} {{$student->lastname}}</td>
                <td>{{$student->fathername}}</td>
                <td class="farsi-number">{{$student->dateofbirth}}</td>
                <td class="farsi-number">{{$student->phone}}</td>
                <td>{{$student->address}}</td>
                <td class="farsi-number">{{$student->fee}}</td>
                @if($student->payed == 1)
                    <td>
                        <h3 class="fa fa-check-circle text-center text-success"></h3>
                    </td>
                @else
                    <td>
                        <h3 class="fa fa-times-circle text-center text-danger"></h3>
                    </td>
                @endif
                <td>
                    <button wire:click="view({{$student->id}})"
                            class="btn btn-sm btn-outline-success py-0">{{__('main.show')}}</button>
                    @can('forceDelete',$student)
                        <button wire:click="edit({{$student->id}})"
                                class="btn btn-sm btn-outline-warning py-0">{{__('main.edit')}}</button>
                        <button wire:click="destroy({{$student->id}})"
                                class="btn btn-sm btn-outline-danger py-0">{{__('main.delete')}}</button>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th style="width:10px">{{__('component.id')}}</th>
            <th>{{__('component.name')}}</th>
            <th>{{__('component.fname')}}</th>
            <th>{{__('component.dateofBirth')}}</th>
            <th>{{__('component.phone')}}</th>
            <th>{{__('component.address')}}</th>
            <th>{{__('component.fee')}}</th>
            <th>{{__('component.paid')}}</th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>