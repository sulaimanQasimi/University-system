<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Subjects extends Component
{
    public $subject, $name, $grade, $edition;
    public $subjects;
    public $updateMode = false;
    protected $rules = [
        'name' => ['required', 'string'],
        'grade' => ['required', 'numeric', 'between:1,12'],
        'edition' => ['required', 'numeric', 'between:2000,2064'],

    ];

    protected function validationAttributes()
    {
        return [
            'name' => trans("NAME"),
            'grade' => trans("GRADE"),
            'edition' => trans("EDITION"),
        ];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function render()
    {
        $this->subjects = \App\Models\Subject::all();
        return view('livewire.subject.subject');
    }

    public function store()
    {
        $this->validate();
        \App\Models\Subject::create([
            'name' => $this->name,
            'grade' => $this->grade,
            'edition' => $this->edition,
        ]);
        $this->reset('name', 'grade', 'edition');
    }

    public function edit($id)
    {
        $record = $this->subjects->find($id);
        $this->subject = $record;
        $this->name = $record->name;
        $this->grade = $record->grade;
        $this->edition = $record->edition;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();
        if ($this->subject) {
            $this->subject->name = $this->name;
            $this->subject->grade = $this->grade;
            $this->subject->edition = $this->edition;
            $this->subject->save();
            $this->reset('subject','name','grade','edition');

        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = \App\Models\Subject::where('id', $id);
            $record->delete();
        }
    }

    public function formReset()
    {
        $this->selected_id = null;
        $this->resetInput();
        $this->updateMode = false;
    }
}
