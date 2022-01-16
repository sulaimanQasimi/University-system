<?php

namespace App\Http\Livewire;

use App\Models\Classes;
use App\Models\ClassRoom;
use Livewire\Component;

class Bill extends Component
{
    public $bills,$classrooms;
    public $classroom,$year;
    public $class;
    protected $rules = [
        'year' => ['required', 'numeric'],
        'classroom' => ['required', 'numeric', 'exists:class_rooms,id'],
    ];
    protected $validationAttributes = [


        'year' => "Year",
        'class' => "Class"


    ];
    public $readyToLoad=false;
    public function mount()
    {   $this->bills=\App\Models\Bill::orderBy('id','desc')->limit(10)->get();
        $this->classrooms=[];
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
        $this->class=ClassRoom::query()->findOrFail($value);
        $this->bills = $this->class->bills;
    }

    public function render()
    {
        return view('livewire.bill');
    }

    public function prints($id)
    {
//        return response()->download(route('file.bill',$id));
        return $this->redirectRoute('file.bill',$id);
    }
}
