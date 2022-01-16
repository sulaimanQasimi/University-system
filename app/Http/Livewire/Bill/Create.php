<?php

namespace App\Http\Livewire\Bill;

use App\Models\Bill;
use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Create extends Component
{
    use AuthorizesRequests;

    public $classroom, $year, $paid, $fee, $remain;
    public $classrooms, $students, $bill_url;

    public $student;
    protected $rules = [
        'year' => ['required', 'numeric'],
        'classroom' => ['required', 'numeric', 'exists:class_rooms,id'],
        'student' => ['required', 'numeric', 'exists:students,id'],
        'fee' => ['required', 'numeric', 'min:1'],
        'paid' => ['required', 'numeric', 'lte:fee'],
        'remain' => ['required', 'numeric', 'lte:paid'],

    ];

    protected function validationAttributes()
    {
        return [
            'year' => trans("YEAR"),
            'classroom' => trans("CLASS ROOM"),
            'paid' => trans("PAID"),
            'student'=>trans("STUDENT"),
            'fee' => trans("FEE"),
            'remain' => trans("REMAIN"),
        ];
    }

    public function mount()
    {
        $this->classrooms = [];
        $this->students = [];

    }

    public function render()
    {
        return view('livewire.bill.create');
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function updatedYear($value)
    {
        $this->classrooms = ClassRoom::query()->whereYear("created_at", $value)->get();
    }

    public function updatedClassroom($value)
    {
        $this->students = ClassRoom::query()->findOrFail($value)->students;
    }

    public function updatedPaid($value)
    {
        $this->remain = $this->fee - $value;
    }

    public function getStudent($id)
    {
        $student = Student::query()->findOrfail($id);
        $this->student = $student->id;

        session()->flash('message', __("message.select", ['name' => $student->firstname]));
    }

    public function save()
    {
        $this->authorize('create',Bill::class);
        $this->validate();
        $bill = Bill::create([
            'class_room_id' => $this->classroom,
            'student_id' => $this->student,
            'fee' => $this->fee,
            'paid' => $this->paid,
            'remain' => $this->remain,
        ]);
        $this->bill_url = $bill->id;
        session()->flash('message', __("message.bill_create"));
        $this->reset('year', 'paid', 'classroom', 'fee', 'remain');

        $this->classrooms = [];
        $this->students = [];

    }

}
