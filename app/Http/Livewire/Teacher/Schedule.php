<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;

class Schedule extends Component
{
    public $teacher;
    public $update;


    public function render()
    {
        return view('livewire.teacher.schedule');
    }
}
