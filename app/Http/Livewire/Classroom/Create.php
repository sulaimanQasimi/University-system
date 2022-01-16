<?php

namespace App\Http\Livewire\Classroom;

use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\College;
use App\Models\SubDepartment;
use Livewire\Component;

class Create extends Component
{
    public $name,$grade,$shift;
    public $college;
    protected $listeners= ['createClass'=>"create"];
    protected $rules=[
      'name'=>['required','string'],
      'grade'=>['required','numeric','between:1,8'],
      'shift'=>['required'],
    ];
    public function render()
    {
        return view('livewire.classroom.create');
    }

    public function create(College $college)
    {
        $this->college=$college;
    }

    public function updated($name)
    {
        $this->validateOnly($name);

    }

    public function store()
    {
        $this->validate();
        ClassRoom::query()->create([
            'college_id'=>$this->college->id,
            'name'=>$this->name."|".$this->grade."|".$this->shift,
            'grade'=>$this->grade,
        ]);
        $this->reset('name','grade','shift');
    }
}
