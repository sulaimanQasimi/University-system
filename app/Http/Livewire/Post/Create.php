<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
    public $postTxt;
    public function render()
    {
        return view('livewire.post.create');
    }
    public function store(){
        $this->validate([
            'postTxt'=>'required',
        ]);
        Post::Create([
            'user_id'=>auth()->id(),
            'txt'=>$this->postTxt,
        ]);
        $this->reset('postTxt');

    }
}
