<?php

namespace App\Http\Livewire\Download;

use App\Models\Download;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $name, $file, $type, $size;

    public function render()
    {
        return view('livewire.download.create');
    }

    public function store()
    {
        $this->validate([
                'name' => 'required',
                'file' => ['required', 'mimes:pdf', 'max:2048'],
            ]
        );

        $path = $this->file->store('download/' . now()->year . '-' . now()->month . '-' . now()->day.'/PDF', 'public');
        Download::create([
            'name' => $this->name,
            'path' => $path,
            'type' => 'PDF',
            'size' => 1024,
        ]);
        $this->reset('file', 'name');
    }
}
