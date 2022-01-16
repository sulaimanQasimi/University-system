<?php

namespace App\Http\Livewire\Teacher\Exam;

use App\Models\ExamQuestion;
use Livewire\Component;

class Question extends Component
{
    public $exam;
    public $question;
    public function render()
    {
        return view('livewire.teacher.exam.question');
    }

    public function store()
    {
        $this->validate([
            'question'=>'required',
        ]);
        ExamQuestion::create([
                'exam_id' => $this->exam->id,
                'question' => $this->question,
            ]);


    }
}
