<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Input extends Component
{
    public $placeholder;
    public $type;
    public $required;
    public $label;
    public $name;
    public $value;

    public function __construct($placeholder = "", $type = "text", $required = false, $label = '', $name = '', $value = '')
    {

        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->required = $required;
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.inputs.input');
    }
}
