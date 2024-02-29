<?php

namespace App\View\Components\Inc;

use Illuminate\View\Component;

class Form extends Component
{
    public $nocv;
    public $type;
    
    public function __construct($nocv = false, $type = false)
    {
        $this->nocv = $nocv;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.inc.form');
    }
}
