<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class BtnCard extends Component
{

    public $class;
    public $link;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = '', $link = '')
    {
        $this->class = $class;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs.btn-card');
    }
}
