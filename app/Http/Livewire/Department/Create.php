<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    use AuthorizesRequests;
    public $name, $header, $phone, $image;
    public $email, $password;

//    use WithFileUploads;

    public function rules()
    {
        return ['name' => ['required', 'unique:departments,name'],
            'header' => 'required',
            'phone' => 'required',
            'email' => ['required', 'unique:users,email'],
//            'image'=>['required','image']
        ];
    }

    public function render()
    {
        return view('livewire.department.create');
    }

    public function store()
    {
        $this->validate();
        $user = User::create([
            'role_id' => 2,
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)]);

        Department::create([
            'user_id' => $user->id,
            'name' => $this->name,
            'header' => $this->header,
            'phone' => $this->phone,
        ]);
        $this->reset(['name', 'header', 'email', 'password', 'phone', 'image']);
        $this->emitUp('close');


    }

}
