<?php

namespace App\Http\Livewire\Department\College;

use App\Models\College;
use App\Models\SubDepartment;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Show extends Component
{

    public $college;
    public $year;
    public $classes;
    public $class;
    public $name, $header, $email, $password;

    protected $listeners = ['showCollege' => 'show'];
    protected $rules = [
        'name' => ['required', 'unique:colleges,name'],
        'header' => 'required',
        'email' => ['required', 'unique:users,email'],
        'password' => ['required', 'min:8'],
    ];

    public function mount()
    {
        $this->classes = [];

    }

    /**
     * @param SubDepartment $subDepartment
     */
    public function show(College $college)
    {
        $this->college = $college;
        $this->name = $this->college->name;
        $this->header = $this->college->header;
        $this->email = $this->college->user->email;
        $this->emitTo('classroom.create', 'createClass', $college);
    }

    public function updatedName($value)
    {
        $this->validateOnly('name');
        $this->college->name = $value;
        $this->college->save();
        $this->college->refresh();

    } public function updatedHeader($value)
    {
        $this->validateOnly('header');
        $this->college->header = $value;
        $this->college->save();
        $this->college->refresh();

    } public function updatedEmail($value)
    {
        $this->validateOnly('email');
        $this->college->user->email = $value;
        $this->college->user->save();
        $this->college->user->refresh();

    } public function updatedPassword($value)
    {
        $this->validateOnly('password');
        $this->college->user->email = Hash::make($value);
        $this->college->user->save();
        $this->college->user->refresh();

    }

    /**
     * @param $year
     */
    public function updatedYear($year)
    {

        $this->classes = $this->college->classrooms()->whereYear('created_at', $year)->get();
    }

    /**
     * @param $value
     */
    public function updatedClass($value)
    {
        $classroom = $this->college->classrooms()->findOrFail($value);
        $this->emitTo('department.college.classroom', 'show', $classroom);
    }

}
