<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $value;
    public $checked;
    public $name;
    public $onchange;
    public $required;
    public $class;
    public $vmodel;

    public function __construct($value = '', $name = '', $checked = false, $onchange = '', $required = false, $class = '', $vmodel = ''){

        $this->value = $value;
        $this->name = $name;
        $this->checked = $checked;
        $this->onchange = $onchange;
        $this->required = $required;
        $this->class = $class;
        $this->vmodel = $vmodel;
    }

    public function render()
    {
        return view('components.inputs.checkbox');
    }
}
