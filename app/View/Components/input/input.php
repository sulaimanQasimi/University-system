<?php

namespace App\View\Components\input;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name,$column;
    public function __construct($name='default',$column='col-md-6')
    {
        $this->name=Str::upper($name);
        $this->column=$column;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.input');
    }
}
