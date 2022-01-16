<?php

namespace App\View\Components\cards;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class simple extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public function __construct($title='default')
    {
        $this->title=Str::upper($title);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.simple');
    }
}
