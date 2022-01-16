<?php

namespace App\Http\Livewire\Teacher\Exam;

use App\Models\ClassExam;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Search extends Component
{
    public $teacher;
    public $exams;
    public $year,$month,$day;
    public $date;
    public function render()
    {
        return view('livewire.teacher.exam.search');
    }


    public function search()
    {
        $this->validate([
            'year'=>"required",
            'month'=>'required',
            'day'=>'required',
        ]);
      $this->exams=  ClassExam::with('classes')->whereYear('date','=',$this->year)->whereMonth('date','=',$this->month)->whereDay('date','=',$this->day)->get();

    }
}
