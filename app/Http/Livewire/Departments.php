<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Livewire\Component;

class Departments extends Component
{
    public $departments;
    public $colleges;
    public $college;
    public $department_selected;
    public $department;
    public $selected_ID;
    protected $listeners = ['close' => 'closed', 'createSuperDepartment' => 'create'];
    public $showMode = false, $indexMode = true, $createMode = false;

    public function mount()
    {
        $this->departments = Department::all();
    }

    public function render()
    {
        return view('livewire.departments');
    }

    public function show(Department $department)
    {
        $this->department_selected = $department;
        $this->selected_ID = $department->id;
        $this->showMode = true;
        $this->indexMode = false;
        $this->emit('show', $department->id);
    }

    public function closed()
    {
        $this->showMode = false;
        $this->indexMode = true;
        $this->createMode = false;
    }

    public function updatedDepartmentSelected($value)
    {
        $this->department = Department::query()->findOrFail($value);
        $this->emit('subDepIntial');
        $this->colleges = $this->department->colleges;
        $this->emitTo('department.show', 'showDepartment', $this->department);
    }

    public function updatedCollege($value)
    {
        $department = $this->department->colleges()->findOrFail($value);
        $this->emitTo('department.college.show', 'showCollege', $department);
    }


    public function create()
    {
        $this->showMode = false;
        $this->indexMode = false;
        $this->createMode = true;
    }
}
