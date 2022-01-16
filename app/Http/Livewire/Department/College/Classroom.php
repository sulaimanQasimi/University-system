<?php

namespace App\Http\Livewire\Department\College;

use App\Models\Classes;
use Livewire\Component;

class Classroom extends Component
{
    public $classroom;
    protected $listeners = ['show' => 'show'];
    public $schedule;
    public $saturday, $sunday, $monday, $tuesday, $wednesday, $thursday, $friday;

    public function render()
    {
        return view('livewire.department.college.classroom');
    }

    private function schedule()
    {

    }

    public function mount()
    {
        $this->saturday = array_fill(1, 6, '');
        $this->sunday = array_fill(1, 6, '');
        $this->monday = array_fill(1, 6, '');
        $this->tuesday = array_fill(1, 6, '');
        $this->wednesday = array_fill(1, 6, '');
        $this->thursday = array_fill(1, 6, '');
        $this->friday = array_fill(1, 6, '');

    }

    public function show(\App\Models\ClassRoom $class)
    {
        $this->classroom = $class;
        $this->schedule = $this->classroom->schedules;
        foreach ($this->schedule as $schedule) {
            switch ($schedule->day) {
                case 1:
                    switch ($schedule->period) {
                        case 1:
                            $this->saturday[1] = $schedule->subject->name;
                            break;
                        case 2:
                            $this->saturday[2] = $schedule->subject->name;
                            break;
                        case 3:
                            $this->saturday[3] = $schedule->subject->name;
                            break;
                        case 4:
                            $this->saturday[4] = $schedule->subject->name;
                            break;
                        case 5:
                            $this->saturday[5] = $schedule->subject->name;
                            break;
                        case 6:
                            $this->saturday[6] = $schedule->subject->name;
                            break;
                    }
                    break;
                case 2:
                    switch ($schedule->period) {
                        case 1:
                            $this->sunday[1] = $schedule->subject->name;
                            break;
                        case 2:
                            $this->sunday[2] = $schedule->subject->name;
                            break;
                        case 3:
                            $this->sunday[3] = $schedule->subject->name;
                            break;
                        case 4:
                            $this->sunday[4] = $schedule->subject->name;
                            break;
                        case 5:
                            $this->sunday[5] = $schedule->subject->name;
                            break;
                        case 6:
                            $this->sunday[6] = $schedule->subject->name;
                            break;
                    }
                    break;
                case 3:
                    switch ($schedule->period) {
                        case 1:
                            $this->monday[1] = $schedule->subject->name;
                            break;
                        case 2:
                            $this->monday[2] = $schedule->subject->name;
                            break;
                        case 3:
                            $this->monday[3] = $schedule->subject->name;
                            break;
                        case 4:
                            $this->monday[4] = $schedule->subject->name;
                            break;
                        case 5:
                            $this->monday[5] = $schedule->subject->name;
                            break;
                        case 6:
                            $this->monday[6] = $schedule->subject->name;
                            break;
                    }
                    break;
                case 4:
                    switch ($schedule->period) {
                        case 1:
                            $this->tuesday[1] = $schedule->subject->name;
                            break;
                        case 2:
                            $this->tuesday[2] = $schedule->subject->name;
                            break;
                        case 3:
                            $this->tuesday[3] = $schedule->subject->name;
                            break;
                        case 4:
                            $this->tuesday[4] = $schedule->subject->name;
                            break;
                        case 5:
                            $this->tuesday[5] = $schedule->subject->name;
                            break;
                        case 6:
                            $this->tuesday[6] = $schedule->subject->name;
                            break;
                    }
                    break;
                case 5:
                    switch ($schedule->period) {
                        case 1:
                            $this->wednesday[1] = $schedule->subject->name;
                            break;
                        case 2:
                            $this->wednesday[2] = $schedule->subject->name;
                            break;
                        case 3:
                            $this->wednesday[3] = $schedule->subject->name;
                            break;
                        case 4:
                            $this->wednesday[4] = $schedule->subject->name;
                            break;
                        case 5:
                            $this->wednesday[5] = $schedule->subject->name;
                            break;
                        case 6:
                            $this->wednesday[6] = $schedule->subject->name;
                            break;
                    }
                    break;
                case 6:
                    switch ($schedule->period) {
                        case 1:
                            $this->thursday[1] = $schedule->subject->name;
                            break;
                        case 2:
                            $this->thursday[2] = $schedule->subject->name;
                            break;
                        case 3:
                            $this->thursday[3] = $schedule->subject->name;
                            break;
                        case 4:
                            $this->thursday[4] = $schedule->subject->name;
                            break;
                        case 5:
                            $this->thursday[5] = $schedule->subject->name;
                            break;
                        case 6:
                            $this->thursday[6] = $schedule->subject->name;
                            break;
                    }
                    break;
                case 7:
                    switch ($schedule->period) {
                        case 1:
                            $this->friday[1] = $schedule->subject->name;
                            break;
                        case 2:
                            $this->friday[2] = $schedule->subject->name;
                            break;
                        case 3:
                            $this->friday[3] = $schedule->subject->name;
                            break;
                        case 4:
                            $this->friday[4] = $schedule->subject->name;
                            break;
                        case 5:
                            $this->friday[5] = $schedule->subject->name;
                            break;
                        case 6:
                            $this->friday[6] = $schedule->subject->name;
                            break;
                    }
                    break;
            }
        }
        $this->emitTo('schedule.create', 'createSchedule', $class);
        $this->emitTo('exam.create', 'createExam', $class);

    }

    public function getSchedule()
    {

    }
}
