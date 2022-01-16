<?php

namespace App\Http\Livewire\Student;

use App\Models\ClassExam;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class View extends Component
{
    public $profile;
    public $classroom;
    public $class;
    public  $exam;

    public function render()
    {
        return view('livewire.student.view');
    }

    public function updatedClassroom($value)
    {
        $this->class=ClassRoom::query()->findOrFail(Crypt::decrypt($value));
    }

    public function exam(ClassExam $exam)
    {
        $this->exam=$exam->Examstudents()->where('student_id',$this->profile->id)->first();
//        dd($exam,$this->exam);

    }
}
