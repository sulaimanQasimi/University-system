<?php

namespace App\Http\Livewire\College;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    use AuthorizesRequests;
    public $department;
    public $name, $header;

    protected $listeners = ['createCollege' => 'create'];

    public function rules()
    {
        return [
          'name'=>['required', 'unique:colleges,name'],
          'header'=>['required', 'min:3']
        ];
    }
    public function render()
    {
        return view('livewire.college.create');
    }

    public function create(Department $department)
    {
        $this->department = $department;

    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function store()
    {
        $this->authorize('view',$this->department);
        $this->validate();
        $user = User::query()->create([
                'role_id' => 3,
                'name' => $this->name,
                'email' => $this->name,
                'password' => Hash::make(env("DEFAULT_PASSWORD"))]);
        $this->department->colleges()->create([
            'department_id' => $this->department->id,
            'user_id' => $user->id,
            'name' => $this->name,
            'header' => $this->header
        ]);
        $this->reset('name','header');

    }
}
