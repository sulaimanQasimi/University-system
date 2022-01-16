<?php

namespace App\Http\Livewire\Exam;

use App\Models\Classes;
use App\Models\ClassExam;
use App\Models\ClassRoom;
use App\Models\ClassStudent;
use App\Models\ExamStudent;
use App\Models\StudentProfile;
use App\Models\Subject;
use App\Models\Teacher;
use Livewire\Component;

class Create extends Component
{
    public $question;
    public $mark, $success;
    public $class, $date;
    public $teacher;
    public $subject;
    public $result;
    public $teachers, $subjects;
    protected $listeners =['createExam'=>'create'];

    public function rules()
    {
        return [
            'subject' => ['required', 'exists:subjects,id'],
            'teacher' => ['required', 'exists:teachers,id'],
            'question' => ['required', 'numeric', 'min:5', 'max:100'],
            'mark' => ['bail','required', 'numeric', 'between:1,100'],
            'success' => ['bail','required','required-with:mark,question', 'numeric', 'lt:' . $this->mark * $this->question],
            'date' => ['required', 'date', 'after:tomorrow'],
            'result' => ['required', 'date', 'after:date'],];

    }


    public function render()
    {
        return view('livewire.exam.create');
    }

    public function create(ClassRoom $class)
    {
        $this->class = $class;
        $this->teachers = Teacher::all();
        $this->subjects = Subject::all();

    }

    public function store()
    {
        $this->validate();
        $exam = ClassExam::query()->updateOrCreate([
            'class_room_id' => $this->class->id,
            'subject_id' => $this->subject,
            'teacher_id' => $this->teacher],[
            'number_of_question' => $this->question,
            'question_mark' => $this->mark,
            'pass_mark' => $this->success,
            'date' => $this->date,
            'result' => $this->result,
        ]);
        $students = ClassStudent::query()->where('class_room_id', $this->class->id)->get();
        foreach ($students as $student) {
            ExamStudent::query()->updateOrCreate([
                'student_id' => $student->student_id,
                'exam_id' => $exam->id,
                'active' => 1],[
                'successMark' => $this->success,
                'mid' => 0,
                'final' => 0,
                'homework' => 0,
                'classActivity' => 0,
            ]);
            StudentProfile::query()->create([
                'student_id' => $student->id,
                'description' => trans('exam.add_student_to_exam', [
                    'id' => $student->id,
                    'name' => $student->firstname,
                    'exam' => $exam->id,
                    'subject' => $exam->subject->name]),]);
        }
        $this->reset('subject', 'teacher', 'question', 'date', 'result', 'success', 'mark');
}

}
