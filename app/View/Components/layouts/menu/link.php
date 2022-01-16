<?php

namespace App\View\Components\layouts\menu;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class link extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name,$route,$parameter,$icon;
    public function __construct($name='default',$icon='circle',$route='dashboard')
    {
        $this->name=Str::upper($name);
        $this->route=$route;
        $this->icon=$icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.menu.link');
    }
}
