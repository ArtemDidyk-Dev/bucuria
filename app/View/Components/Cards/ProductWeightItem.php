<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class ProductWeightItem extends Component
{
    
    public $active;
    public $title;

    public function __construct($active = '', $title = '')
    {
        $this->active = $active;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.product-weight-item');
    }
}
