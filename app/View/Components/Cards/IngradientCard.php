<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class IngradientCard extends Component
{

    public $ingradient;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ingradient = '')
    {
        $this->ingradient = $ingradient;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.ingradient-card');
    }
}
