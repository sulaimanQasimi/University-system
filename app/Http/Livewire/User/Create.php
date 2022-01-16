<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $user;
    public $username,$email,$password,$image,$role;
    protected $rules = [
        'username'   => ['required','unique:departments,name'],
        'role'  => ['required','exists:roles,id'],
        'email'  => ['required','unique:users,email'],
        'password'=>['required','min:8'],
        'image'=>['required','image'],

    ];
    protected $validationAttributes = [
        'username' => "Username",
        'email' => "Email",
        'role'=>"Role",
        'password'=>"Password",
        'image'=>"Profile Image"

    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function render()
    {
        return view('livewire.user.create');
    }

    public function save(){
        $this->validate();
        $path=$this->image->store('account/user/profile','public');
        $image =Image::make(public_path("storage/{$path}"))->fit('128','128');
        $image->save();
        $user=  User::create([
            'role_id'=>$this->role,
            'name' => $this->username,
            'email' => $this->email,
            'profile_photo_path'=>$path,
            'password' => Hash::make($this->password)]);
        $this->reset(['username','email','password','image']);



    }
}

