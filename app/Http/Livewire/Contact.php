<?php

namespace App\Http\Livewire;

use App\Models\Contect;
use Livewire\Component;
use Livewire\WithPagination;

class Contact extends Component
{
    use WithPagination;
    protected $paginationThem='bootstrap';
    public $data, $name, $email, $selected_id;

    public $updateMode = false;

    public function render()
    {
        $this->data = Contect::all();
        return view('livewire.contact');
    }
    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'email' => 'required|email'
        ]);
        Contect::create([
            'name' => $this->name,
            'email' => $this->email
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Contect::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'email' => 'required|email'
        ]);
        if ($this->selected_id) {
            $record = Contect::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }
    public function destroy($id)
    {
        if ($id) {
            $record = Contect::where('id', $id);
            $record->delete();
        }
    }

}
