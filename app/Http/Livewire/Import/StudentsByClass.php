<?php

namespace App\Http\Livewire\Import;

use App\Models\Classroom;
use App\Models\ClassStudent;
use Livewire\Component;

class StudentsByClass extends Component
{
    public $classroom;//Import student to
    public $class;// Select class model
    public $classrooms;//Import student from
    public $year; //The year of class
    protected $listeners = ['ImportStudentByClass' => 'create'];

    /*
     * Rules
     * */
    protected function rules()
    {
        return [
            'class' => ['required', 'exists:class_rooms,id'],
            'year' => ['required', 'numeric', 'min:1980', 'max:' . now()->year]
        ];
    }


    public function mount()
    {
        $this->classrooms = [];

    }

    public function render()
    {
        return view('livewire.import.students-by-class');
    }

    public function updated($name)
    {
        $this->validateOnly($name);

    }

    public function create(Classroom $class)
    {

        $this->classroom = $class;
    }

    public function updatedYear($value)
    {
        $this->classrooms = $this->classroom->college->classrooms()->whereYear('created_at', $value)->get();
    }

    public function store()
    {
        $this->validate();
        $class=Classroom::query()->findOrFail($this->class);

        foreach ($class->students as $student){
            ClassStudent::query()->updateOrCreate([
                'class_room_id'=>$this->classroom->id,
                'student_id'=>$student->id,
            ]);
        }
        $this->classrooms=[];
        $this->reset('class','year','classroom');

    }
}
