<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tab extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id, $name, $color;

    public function __construct($name = "default", $color = "primary")
    {
        $this->id = 'Tab-' . rand(1, 1000000000);
        $this->name = $name;
        $this->color=$color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tab');
    }
}
