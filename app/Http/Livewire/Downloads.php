<?php

namespace App\Http\Livewire;

use App\Models\Download;
use Livewire\Component;

class Downloads extends Component
{
    public $files;

    public function render()
    {
        $this->files=Download::all();
        return view('livewire.downloads');
    }

    public function downloadPath($id)
    {
     $download=   Download::findOrFail($id);
        return response()->download(public_path('storage/'.$download->path),$download->name.'.pdf');
    }
}
