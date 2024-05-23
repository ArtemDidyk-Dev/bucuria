<?php

namespace App\View\Components\Inc;

use Illuminate\View\Component;

class Form extends Component
{
    public $nocv;
    public $type;
    public $department;
    public function __construct($nocv = false, $type = false, $department = false)
    {
        $this->nocv = $nocv;
        $this->type = $type;
        $this->department = $department;
    }

    public function render()
    {
        return view('components.inc.form');
    }
}
