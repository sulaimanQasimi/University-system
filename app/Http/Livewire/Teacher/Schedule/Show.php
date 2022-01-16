<?php

namespace App\Http\Livewire\Teacher\Schedule;

use Illuminate\Support\Facades\Date;
use Livewire\Component;

class Show extends Component
{
    public $teacher;
    public $update;
    public $schedules;
    public $Mode=false;

    protected $listeners=['ScheduleUpdate'=>'updates'];
    public function mount()
    {

    }

    public function updates($value)
    {
        $this->update=Date::now()->addDays($value);
      $this->schedules= $this->teacher->schedules()->whereYear('date','=',$this->update->year)->whereMonth('date','=',$this->update->month)->whereDay('date','=',$this->update->day)->get();
    $this->Mode=true;
    }
    public function render()
    {
        return view('livewire.teacher.schedule.show');
    }
}
