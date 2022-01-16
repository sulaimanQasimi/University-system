<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Teacher extends Component
{
    public $teacher;
    public $D=1;

    protected $listeners=['TeacherExam'=>'show'];

    public function render()
    {
        return view('livewire.teacher');
    }

    public function show()
    {
$this->D+=10000;

//        $this->emit('TeacherExam');
    }
}
