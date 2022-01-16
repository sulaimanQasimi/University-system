<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Show extends Component
{
    public $department;
    public $DID;
    public $name, $header, $email, $password;
    protected $rules = [
        'name' => ['required', 'unique:sub_departments,name'],
        'header' => 'required',
        'email' => ['required', 'unique:users,email'],
        'password' => ['required', 'max:8'],
    ];

    protected $listeners = ['showDepartment' => 'show'];

    /**
     * @param Department $department
     */
    public function show(Department $department)
    {
        $this->department = $department;
        $this->emitTo('college.create','createCollege',$department);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.department.show');

    }

    /**
     * @param $value
     */
    public function updatedName($value)
    {
        $this->validateOnly('name');
        $this->department->name = $value;
        $this->department->save();
        $this->department->refresh();

    }

    /**
     * @param $value
     */
    public function updatedHeader($value)
    {
        $this->validateOnly('header');
        $this->department->header = $value;
        $this->department->save();
        $this->department->refresh();

    }

    /**
     * @param $value
     */
    public function updatedEmail($value)
    {
        $this->validateOnly('email');
        $this->department->user->email = $value;
        $this->department->user->save();
        $this->department->user->refresh();

    }

    /**
     * @param $value
     */
    public function updatedPassword($value)
    {
        $this->validateOnly('password');
        $this->department->user->password = Hash::make($value);
        $this->department->user->save();
        $this->department->user->refresh();

    }
}
