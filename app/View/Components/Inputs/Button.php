<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $action;
    public $href;

    public function __construct($type = '', $action = '', $href = '')
    {
        $this->type = $type;
        $this->action = $action;
        $this->href = $href;
    }

    public function render()
    {
        return view('components.inputs.button');
    }
}
