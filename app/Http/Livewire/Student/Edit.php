<?php

namespace App\Http\Livewire\Student;

use App\Models\College;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $student;
    public $firstname, $fathername, $lastname,
        $grandfathername, $grade,
        $dateofBirth, $phone, $address,
        $sex, $kankor, $school,
        $image, $department, $year, $departments;

    public $email, $password;
    public $colleges, $college;

    protected function rules()
    {

        $array = ['firstname' => ['required', 'string']];
        $array = Arr::add($array, 'lastname', ['required', 'string']);
        $array = Arr::add($array, 'college', ['required', 'exists:colleges,id']);
        $array = Arr::add($array, 'grade', ['required', 'numeric', 'between:1,8']);
        if (config('university.student.info')) {
            $array = Arr::add($array, 'fathername', ['required', 'string']);
            $array = Arr::add($array, 'grandfathername', ['required', 'string']);
            $array = Arr::add($array, 'dateofBirth', ['required', 'date']);
            $array = Arr::add($array, 'sex', ['required', 'in:M,F']);
        }
        if (config('university.student.account')) {
            $array = Arr::add($array, 'email', ['nullable', 'unique:users,email']);
            $array = Arr::add($array, 'password', ['required_with:email', 'min:8']);

        }

        if (config('university.student.image')) {
            $array = Arr::add($array, 'image', ['required', 'image']);
        }
        if (config('university.student.school')) {

            $array = Arr::add($array, 'school', ['required', 'string']);
            $array = Arr::add($array, 'year', ['required', 'numeric']);
        }
        if (config('university.student.national_exam')) {
            $array = Arr::add($array, 'kankor', ['required', 'unique:students,kankor_id']);
        }
        if (config('university.student.contact')) {
            $array = Arr::add($array, 'phone', ['required', 'numeric']);
        }
        if (config('university.student.address')) {
            $array = Arr::add($array, 'address', ['required', 'string']);
        }
        return $array;
    }

    public function mount()
    {
        $this->colleges = College::all();
        $this->firstname = $this->student->firstname;
        $this->lastname = $this->student->lastname;
        $this->fathername = $this->student->fathername;
        $this->grandfathername = $this->student->grandfathername;
        $this->kankor = $this->student->kankor_id;
        $this->grade = $this->student->grade;
        $this->school = $this->student->school;
        $this->phone = $this->student->phone;
        $this->dateofBirth = $this->student->dateofbirth;
        $this->address = $this->student->address;

    }

    protected function validationAttributes()
    {
        $array = ['firstname' => __("NAME")];
        $array = Arr::add($array, 'lastname', __("LAST NAME"));
        $array = Arr::add($array, 'college', __("COLLEGE"));
        $array = Arr::add($array, 'grade', __("GRADE"));
        if (config('university.student.info')) {
            $array = Arr::add($array, 'fathername', __("FATHER NAME"));
            $array = Arr::add($array, 'grandfathername', __("GRAND FATHER NAME"));
            $array = Arr::add($array, 'dateofBirth', __("DATE OF BIRTH"));
            $array = Arr::add($array, 'sex', __("SEX"));

        }


        if (config('university.student.account')) {
            $array = Arr::add($array, 'email', __("EMAIL"));
            $array = Arr::add($array, 'password', __("PASSWORD"));

        }

        if (config('university.student.image')) {
            $array = Arr::add($array, 'image', __("IMAGE"));
        }
        if (config('university.student.school')) {

            $array = Arr::add($array, 'school', __("SCHOOL NAME"));
            $array = Arr::add($array, 'year', __("GRADUATION YEAR"));
        }
        if (config('university.student.national_exam')) {

            $array = Arr::add($array, 'kankor', __("NATIONAL EXAM ID"));
        }
        if (config('university.student.contact')) {
            $array = Arr::add($array, 'phone', __("PHONE"));
        }
        if (config('university.student.address')) {
            $array = Arr::add($array, 'address', __("ADDRESS"));
        }
        return $array;


    }

    public function render()
    {
        return view('livewire.student.create');
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }


    public function store()
    {
        $this->validate();

        if (config('university.student.image')) {
            $path = $this->image->store('student/photo', 'public');

            $image = Image::make(public_path("storage/{$path}"))->fit('128', '128');
            $image->save();
        } else {
            $path = '';
        }
        $user = '';

        if (config('university.student.account')) {
            $user = User::create([
                'role_id' => 7,
                'name' => $this->firstname,
                'email' => $this->email,
                'profile_photo_path' => $path,
                'password' => Hash::make($this->password)]);
        }

        $this->student->firstname = $this->firstname;
        $this->student->lastname = $this->lastname;
        $this->student->college_id = $this->college;
        $this->student->grade = $this->grade;

        if (config('university.student.info')) {
            $this->student->fathername = $this->fathername;
            $this->student->grandfathername = $this->grandfathername;
            $this->student->dateofbirth = $this->dateofBirth;
            $this->student->sex = $this->sex;

        }


        if (config('university.student.account')) {
            $this->student->user_id = $user->id;

        }

        if (config('university.student.image')) {
            $this->student->image = $path;
        }
        if (config('university.student.school')) {

            $this->student->school = $this->school;
            $this->student->year = $this->year;
        }
        if (config('university.student.national_exam')) {

            $this->student->kankor = $this->kankor;
        }
        if (config('university.student.contact')) {
            $this->student->phone = $this->phone;
        }
        if (config('university.student.address')) {
            $this->student->address = $this->address;
        }

        $this->student->save();
        $this->reset('firstname', 'lastname', 'fathername', 'grandfathername', 'grade', 'dateofBirth',
            'phone', 'fathername', 'address', 'email', 'college', 'password', 'image', 'sex', 'school', 'kankor', 'year');
    }
}
