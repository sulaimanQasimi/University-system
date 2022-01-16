<?php

namespace App\Http\Livewire\Teacher;

use App\Models\College;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    public $teacher;

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
        $this->firstname = $this->teacher->firstname;
        $this->lastname = $this->teacher->lastname;
        $this->college = $this->teacher->college_id;

        if (config('university.teacher.info')) {
            $this->fathername = $this->teacher->fathername;
            $this->dateofbirth = $this->teacher->dateofbirth;
            $this->sex = $this->teacher->sex;
            $this->field = $this->teacher->field;
            $this->experience = $this->teacher->experience;
            $this->salary = $this->teacher->salary;

        }

        if (config('university.teacher.image')) {
            $this->image = '';
        }
        if (config('university.teacher.contact')) {
            $this->phone = $this->teacher->phone;
        }
        if (config('university.teacher.address')) {
            $this->address = $this->teacher->address;
        }
    }


    public function render()
    {
        return view('livewire.teacher.edit');
    }

    public function store()
    {
        $this->validate();


        if (config('university.teacher.image')) {
            $path = $this->image->store('teacher/photo', 'public');

            $image = Image::make(public_path("storage/{$path}"))->fit('128', '128');
            $image->save();
        } else {
            $path = '';
        }
                $this->teacher->firstname = $this->firstname;
        $this->teacher->lastname = $this->lastname;
        $this->teacher->college_id = $this->college;

        if (config('university.teacher.info')) {
            $this->teacher->fathername = $this->fathername;
            $this->teacher->dateofbirth = $this->dateofbirth;
            $this->teacher->sex = $this->sex;
            $this->teacher->field = $this->field;
            $this->teacher->experience = $this->experience;
            $this->teacher->salary = $this->salary;

        }
        if (config('university.teacher.image')) {
            $this->teacher->image = $path;
        }
        if (config('university.teacher.contact')) {
            $this->teacher->phone = $this->phone;
        }
        if (config('university.teacher.address')) {
            $this->teacher->address = $this->address;
        }
$this->teacher->save();
        $this->reset('firstname', 'lastname', 'fathername', 'dateofbirth',
            'phone', 'fathername', 'address', 'email', 'college', 'password', 'image', 'sex');

    }
}
