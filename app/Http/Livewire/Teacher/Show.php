<?php

namespace App\Http\Livewire\Teacher;

use Illuminate\Support\Str;
use Livewire\Component;

class Show extends Component
{
    public $teacher;
    public $class;
    public $schedule;
    public $exams;
    public $year;
    public $saturday, $sunday, $monday, $tuesday, $wednesday, $thursday, $friday;

    public function mount()
    {

        $this->saturday = array_fill(1, 6, '');
        $this->sunday = array_fill(1, 6, '');
        $this->monday = array_fill(1, 6, '');
        $this->tuesday = array_fill(1, 6, '');
        $this->wednesday = array_fill(1, 6, '');
        $this->thursday = array_fill(1, 6, '');
        $this->friday = array_fill(1, 6, '');


       $this->schedule=$this->teacher->schedules;

        foreach ($this->schedule as $schedule) {
            switch ($schedule->day) {
                case 1:
                    switch ($schedule->period) {
                        case 1:
                            $this->saturday[1] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 2:
                            $this->saturday[2] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 3:
                            $this->saturday[3] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 4:
                            $this->saturday[4] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 5:
                            $this->saturday[5] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 6:
                            $this->saturday[6] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                    }
                    break;
                case 2:
                    switch ($schedule->period) {
                        case 1:
                            $this->sunday[1] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 2:
                            $this->sunday[2] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 3:
                            $this->sunday[3] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 4:
                            $this->sunday[4] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 5:
                            $this->sunday[5] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 6:
                            $this->sunday[6] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                    }
                    break;
                case 3:
                    switch ($schedule->period) {
                        case 1:
                            $this->monday[1] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 2:
                            $this->monday[2] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 3:
                            $this->monday[3] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 4:
                            $this->monday[4] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 5:
                            $this->monday[5] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 6:
                            $this->monday[6] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                    }
                    break;
                case 4:
                    switch ($schedule->period) {
                        case 1:
                            $this->tuesday[1] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 2:
                            $this->tuesday[2] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 3:
                            $this->tuesday[3] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 4:
                            $this->tuesday[4] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 5:
                            $this->tuesday[5] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 6:
                            $this->tuesday[6] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                    }
                    break;
                case 5:
                    switch ($schedule->period) {
                        case 1:
                            $this->wednesday[1] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 2:
                            $this->wednesday[2] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 3:
                            $this->wednesday[3] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 4:
                            $this->wednesday[4] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 5:
                            $this->wednesday[5] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 6:
                            $this->wednesday[6] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                    }
                    break;
                case 6:
                    switch ($schedule->period) {
                        case 1:
                            $this->thursday[1] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 2:
                            $this->thursday[2] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 3:
                            $this->thursday[3] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 4:
                            $this->thursday[4] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 5:
                            $this->thursday[5] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 6:
                            $this->thursday[6] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                    }
                    break;
                case 7:
                    switch ($schedule->period) {
                        case 1:
                            $this->friday[1] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 2:
                            $this->friday[2] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 3:
                            $this->friday[3] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 4:
                            $this->friday[4] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 5:
                            $this->friday[5] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                        case 6:
                            $this->friday[6] = $schedule->subject->name.Str::title($schedule->classroom->name);
                            break;
                    }
                    break;
            }
        }
        $this->exams=$this->teacher->exams;
    }
    public function render()
    {
        return view('livewire.teacher.show');
    }

    public function updatedYear($value)
    {
        $this->exams=$this->teacher->exams()->whereYear('created_at',$value)->get();

    }
}
