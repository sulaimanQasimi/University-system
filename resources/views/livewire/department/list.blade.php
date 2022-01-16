<div>
    <div class="row">
        <div class="col-md-6" wire:ignore>
            <select id="select_department" class="form-control select-department">
                <option>{{__("DEPARTMENT")}}</option>
                @forelse($departments as  $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @empty
                    <option>{{__('message.not_found')}}</option>
                @endforelse
            </select>
        </div>
        @if($department)
            <div class="col-md-6">
                <select wire:model="college" class="form-control select-department">
                    <option>{{__("SUB DEPARTMENT")}}</option>
                    @forelse($colleges as  $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @empty
                        <option>{{__('message.not_found')}}</option>
                    @endforelse
                </select>


            </div>
        <div class="col-md-12">
            <livewire:department.show />

        </div>
            <livewire:department.college.show />

        @endif

    </div>
    @push('js')
        <script>
            window.livewire.on('subDepIntial', function () {


            });

            $(function () {
                //Initialize Select2 Elements
                $('.select-department').select2({
                    theme: 'bootstrap4'
                }).on('change',function () {
                    @this.set('department_selected',$(this).val());
                });
            });

        </script>
    @endpush
</div>