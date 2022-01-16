<?php

namespace App\Http\Livewire\Import;

use App\Models\Classes;
use App\Models\ClassRoom;
use Livewire\Component;

class StudentsById extends Component
{
    public $classroom;
    public $student;
    protected $listeners = ['ImportStudentById' => 'create'];
    /*
     * Rules
     * */
    protected function rules()
    {
        return [
            'student' => ['required', 'exists:students,id'],
        ];
    }
    public function render()
    {
        return view('livewire.import.students-by-id');
    }
    public function updated($name)
    {
        $this->validateOnly($name);
    }
    public function create(ClassRoom $class)
    {
        $this->classroom = $class;
    }
    public function store()
    {
        $this->validate();
        $this->classroom->classStudents()->updateOrCreate([
            'class_room_id'=>$this->classroom->id,
            'student_id'=>$this->student,
        ]);
        $this->reset('student','classroom');
    }
}
