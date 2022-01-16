<?php

namespace App\View\Components\input;

use Illuminate\View\Component;

class error extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     *
     */
    public $name;
    public function __construct($name='default')
    {
        $this->name=$name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.error');
    }
}
