<?php

namespace App\View\Components\cards\lists;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class link extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */   public $name;
    public function __construct($name='default')
    {
        $this->name=Str::upper($name);

        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.lists.link');
    }
}
