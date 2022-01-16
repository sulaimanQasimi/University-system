<?php

namespace App\Http\Livewire\Teacher;

use App\Models\College;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $colleges, $college;

    public $firstname, $lastname, $fathername, $sex, $dateofbirth, $field,
        $experience, $image, $address, $phone, $email, $password, $salary;

    protected function rules()
    {

        $array = ['firstname' => ['required', 'string']];
        $array = Arr::add($array, 'lastname', ['required', 'string']);
        $array = Arr::add($array, 'college', ['required', 'exists:colleges,id']);
        if (config('university.teacher.info')) {
            $array = Arr::add($array, 'fathername', ['required', 'string']);
            $array = Arr::add($array, 'dateofbirth', ['required', 'date']);
            $array = Arr::add($array, 'sex', ['required', 'in:M,F']);
            $array = Arr::add($array, 'field', ['required', 'string']);
            $array = Arr::add($array, 'experience', ['required', 'numeric', 'between:0,50']);
            $array = Arr::add($array, 'salary', ['required', 'numeric', 'between:0,500000']);
        }


        if (config('university.teacher.account')) {
            $array = Arr::add($array, 'email', ['required', 'unique:users,email']);
            $array = Arr::add($array, 'password', ['required_with:email', 'min:8']);

        }

        if (config('university.teacher.image')) {
            $array = Arr::add($array, 'image', ['required', 'image']);
        }
        if (config('university.teacher.contact')) {
            $array = Arr::add($array, 'phone', ['required', 'numeric']);
        }
        if (config('university.teacher.address')) {
            $array = Arr::add($array, 'address', ['required', 'string']);
        }
        return $array;
    }

    protected function validationAttributes()
    {
        $array = ['firstname' => __("NAME")];
        $array = Arr::add($array, 'lastname', __("LAST NAME"));
        $array = Arr::add($array, 'college', __("COLLEGE"));
        if (config('university.teacher.info')) {
            $array = Arr::add($array, 'fathername', __("FATHER NAME"));
            $array = Arr::add($array, 'dateofbirth', __("DATE OF BIRTH"));
            $array = Arr::add($array, 'sex', __("SEX"));

            $array = Arr::add($array, 'field', __("FIELD"));
            $array = Arr::add($array, 'experience', __("EXPERIENCE"));
            $array = Arr::add($array, 'salary', __("SALARY"));
        }

        if (config('university.teacher.account')) {
            $array = Arr::add($array, 'email', __("EMAIL"));
            $array = Arr::add($array, 'password', __("PASSWORD"));

        }

        if (config('university.teacher.image')) {
            $array = Arr::add($array, 'image', __("IMAGE"));
        }

        if (config('university.teacher.contact')) {
            $array = Arr::add($array, 'phone', __("PHONE"));
        }
        if (config('university.teacher.address')) {
            $array = Arr::add($array, 'address', __("ADDRESS"));
        }
        return $array;


    }

    public function mount()
    {
        $this->colleges = College::all();
    }


    public function render()
    {
        return view('livewire.teacher.create');
    }

    public function store()
    {
        $this->validate();


        if (config('university.teacher.image')) {
            $path = $this->image->store('teacher/photo', 'public');

            $image = Image::make(public_path("storage/{$path}"))->fit('128', '128');
            $image->save();
        }else{
            $path ='';
        }
        $user = '';

        if (config('university.teacher.account')) {
            $user = User::create([
                'role_id' => 6,
                'name' => $this->firstname,
                'email' => $this->email,
                'profile_photo_path' => $path,
                'password' => Hash::make($this->password)]);
        }


        $array = ['firstname' => $this->firstname];
        $array = Arr::add($array, 'lastname', $this->lastname);
        $array = Arr::add($array, 'college_id', $this->college);

        if (config('university.teacher.info')) {
            $array = Arr::add($array, 'fathername', $this->fathername);
           $array = Arr::add($array, 'dateofbirth', $this->dateofbirth);
            $array = Arr::add($array, 'sex', $this->sex);
            $array = Arr::add($array, 'field',$this->field);
            $array = Arr::add($array, 'experience',$this->experience);
            $array = Arr::add($array, 'salary', $this->salary);

        }


        if (config('university.teacher.account')) {
            $array = Arr::add($array, 'user_id', $user->id);

        }

        if (config('university.teacher.image')) {
            $array = Arr::add($array, 'image', $path);
        }
        if (config('university.teacher.contact')) {
            $array = Arr::add($array, 'phone', $this->phone);
        }
        if (config('university.teacher.address')) {
            $array = Arr::add($array, 'address', $this->address);
        }
        $teacher = \App\Models\Teacher::create($array);

        $this->reset('firstname', 'lastname', 'fathername',  'dateofbirth',
            'phone', 'fathername', 'address', 'email', 'college', 'password', 'image', 'sex');

    }
}
