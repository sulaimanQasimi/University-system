<?php

namespace App\Http\Livewire\Teacher\Exam;

use App\Models\ClassExam;
use Livewire\Component;

class Student extends Component
{
    public $exam;
    protected $listeners=['examStudent'=>'show'];

    public function show(ClassExam $exam)
    {
        $this->exam=$exam;
    }
    public function render()
    {
        return view('livewire.teacher.exam.student');
    }
}
