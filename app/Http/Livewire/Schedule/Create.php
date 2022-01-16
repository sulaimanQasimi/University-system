<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\ClassSchedule;
use App\Models\Subject;
use App\Models\Teacher;
use Livewire\Component;

class Create extends Component
{
    public $subjects, $teachers,$class;
    public $teacher, $subject, $day, $period;
    protected $listeners=['createSchedule'=>'show'];


    protected function rules()
    {
        return
            [
                'teacher' => ['required', 'exists:teachers,id'],
                'subject' => ['required', 'exists:subjects,id'],
                'day' => ['required', 'numeric', 'in:1,2,3,4,5,6,7'],
                'period' => ['required', 'numeric', 'in:1,2,3,4,5,6'],];
    }

    public function show(ClassRoom $class)
    {
        $this->class=$class;

    }
    public function mount()
    {
        $this->teachers=Teacher::all();
        $this->subjects=Subject::all();

    }
    public function render()
    {
        return view('livewire.schedule.create');
    }

    public function updated($name)
    {
        $this->validateOnly($name);

    }

    public function store()
    {
        $this->validate();

        ClassSchedule::query()->updateOrCreate([
            'class_room_id'=>$this->class->id, 'period' => $this->period, 'day' => $this->day
        ], [
            'teacher_id' => $this->teacher, 'subject_id' => $this->subject,
        ]);
        $this->reset('period','day','teacher','subject');
    }
}
