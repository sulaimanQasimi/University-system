<div>
    @includeIf('livewire.department.list')
@can('create',\App\Models\Department::class)
            <a href="{{route('department.create')}}" target="_blank" class="display-6 back-to-top" role="button" aria-label="Scroll to top">
                <i class="fas fa-plus-circle"></i>
            </a>
    @endcan
</div>
