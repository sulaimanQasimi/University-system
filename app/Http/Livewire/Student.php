<?php

namespace App\Http\Livewire;

use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Student extends Component
{
    use WithFileUploads;
    public $students;
    public $viewMode=false,$updateMode=false,$createMode=false,$searchMode=false,$classMode=true;
    public $s_id,$UID,$firstname,$fathername,$lastname,$grandfathername,$grade,$dateofBirth,$phone,$address,$image,$fee,$payed;
    public $email,$password;
    public $studentClass,$className,$class,$select_id,$exam,$result;

    public $search;
    public $role_id=7;
    public function render()
    {
        return view('livewire.student.index');
    }
    public function view(\App\Models\Student $student)
    {
        $this->s_id=$student->id;
        $this->firstname=$student->firstname;
        $this->fathername=$student->fathername;
        $this->grandfathername=$student->grandfathername;
        $this->dateofBirth=Date::make($student->dateofbirth)->format('Y:m:d');
        $this->grade=$student->grade;
        $this->class=$student->classStudent;
        $this->image=$student->image;
        $this->phone=$student->phone;
        $this->address=$student->address;
        $this->class=$student->classStudent;
        $this->exam=$student->ExamStudent;
        $this->viewMode=true;
        $this->searchMode=false;
        $this->updateMode=false;
}
    public function createAc()
    {
        if ($this->createMode==false)
        {
            $this->createMode=true;
        }else{
            $this->createMode=false;
        }
    }

    public function classView()
    {
        $this->validate([
        'select_id' => 'required',
    ],[
            'select_id.required'=>__('valid.required',['name'=>__('main.search')]),
        ]);

        $this->reset('studentClass');

        $this->studentClass = \App\Models\Student::findOrFail($this->s_id)->examStudent()->where('Student_class_id',$this->select_id)->get();
    }
    public function edit($id)
    {
        $student=\App\Models\Student::findOrFail($id);
        $this->s_id=$student->id;
        $this->UID=$student->user_id;
        $this->firstname=$student->firstname;
        $this->fathername=$student->fathername;
        $this->grandfathername=$student->grandfathername;
        $this->dateofBirth=Date::make($student->dateofbirth)->format('Y:m:d');
        $this->grade=$student->grade;
        $this->class=$student->classStudent;
        $this->image=$student->image;
        $this->phone=$student->phone;
        $this->address=$student->address;
        $this->viewMode=false;
        $this->updateMode=true;
        $this->searchMode=false;
}
    public function update()
    {
        $this->validate([
            'firstname' => 'required',
            'fathername' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'grandfathername' => 'required',
            'dateofBirth' => 'required',
            'grade' => 'required',
            'phone' => 'required',
            'address' => 'required',
            ], [
            'firstname.required' => __('valid.required', ['name' => __('component.name')]),
            'fathername.required' => __('valid.required', ['name' => __('component.fname')]),
            'grandfathername.required' => __('valid.required', ['name' => __('component.mname')]),
            'lastname.required' => __('valid.required', ['name' => __('component.lastname')]),
            'middlename.required' => __('valid.required', ['name' => __('component.name')]),
            'dateofBirth.required' => __('valid.required', ['name' => __('component.dateofBirth')]),
            'grade.required' => __('valid.required', ['name' => __('component.grade')]),
            'phone.required' => __('valid.required', ['name' => __('component.phone')]),
            'address.required' => __('valid.required', ['name' => __('component.address')]),
        ]);
        $id = User::findOrFail($this->UID);

       $student= \App\Models\Student::findOrFail($this->s_id);

        $student->firstname=$this->firstname;
        $student->fathername=$this->fathername;
        $student->grandfathername=$this->grandfathername;
        $student->middlename=$this->middlename;
        $student->dateofBirth=$this->dateofBirth;
        $student->grade=$this->grade;
        $student->phone=$this->phone;
        $student->address=$this->address;
        $student->save();
        $this->viewMode=false;
        $this->searchMode=false;
        $this->updateMode=false;
    }
    public function search()
    {
        $this->validate([
            'search' => 'required',
        ],
            [
                'search.required'=>__('valid.required',['name'=>__('main.search')]),
            ]);
        $this->students=\App\Models\Student::where('id','like','%'.$this->search.'%')->orWhere('firstname','like','%'.$this->search.'%')
            ->orWhere('middlename','like','%'.$this->search.'%')->orWhere('user_id','like','%'.$this->search.'%')->orWhere('lastname','like','%'.$this->search.'%')->orWhere('fathername','like','%'.$this->search.'%')->orWhere('grandfathername','like','%'.$this->search.'%')->orWhere('grade','like','%'.$this->search.'%')->orWhere('dateofbirth','like','%'.$this->search.'%')->orWhere('phone','like','%'.$this->search.'%')->get();
        $this->viewMode=false;
        $this->updateMode=false;
        $this->searchMode=true;
    }
    public function store()
    {
        $this->validate([
            'firstname' => 'required',
            'fathername' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'grandfathername' => 'required',
            'dateofBirth' => 'required',
            'grade' => 'required',
            'email' => ['required', 'unique:users,email'],
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => ['required', 'image'],
        ], [
            'firstname.required' => __('valid.required', ['name' => __('component.name')]),
            'fathername.required' => __('valid.required', ['name' => __('component.fname')]),
            'grandfathername.required' => __('valid.required', ['name' => __('component.mname')]),
            'lastname.required' => __('valid.required', ['name' => __('component.lastname')]),
            'middlename.required' => __('valid.required', ['name' => __('component.name')]),
            'dateofBirth.required' => __('valid.required', ['name' => __('component.dateofBirth')]),
            'grade.required' => __('valid.required', ['name' => __('component.grade')]),
            'phone.required' => __('valid.required', ['name' => __('component.phone')]),
            'address.required' => __('valid.required', ['name' => __('component.address')]),
            'password.required' => __('valid.required', ['name' => __('component.password')]),
            'image.required' => __('valid.required', ['name' => __('component.image')]),
            'image.image' => __('valid.image'),
            'email.required' => __('valid.required', ['name' => __('component.email')]),
            'email.unique' => __('valid.unique', ['name' => __('component.email')]),
        ]);
        $path = $this->image->store('student/photo', 'public');
        $image = Image::make(public_path("storage/{$path}"))->fit('128', '128');
        $image->save();
        $id = User::create([
            'role_id' => 7,
            'name' => $this->firstname,
            'email' => $this->email,
            'profile_photo_path' => $path,
            'password' => Hash::make($this->password)]);

        \App\Models\Student::create([
            'user_id'=>$id->id,
            'firstname'=>$this->firstname,
            'lastname'=>$this->lastname,
            'middlename'=>$this->middlename,
            'fathername'=>$this->fathername,
            'grandfathername'=>$this->grandfathername,
            'grade'=>$this->grade,
            'dateofbirth'=>$this->dateofBirth,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'image'=>$path,
        ]);
    }
    public function destroy(\App\Models\Student $student)
    {
        $student->delete();

        $this->searchMode=true;
    }




}
