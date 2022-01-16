<?php

namespace App\Http\Livewire\Teacher\Result;

use Livewire\Component;
class Show extends Component
{
    public $exam;
    public $classActivity=[],$homework=[],$mid=[],$final=[];
    public function render()
    {
        return view('livewire.teacher.result.show');
    }
}
