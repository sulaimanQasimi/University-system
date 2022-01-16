<?php

namespace App\View\Components\input;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class image extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id,$name;
    public function __construct($name="image")
    {
        $this->name=Str::upper($name);
        $this->id = "Image-" . rand(1, 10000000);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.image');
    }
}
