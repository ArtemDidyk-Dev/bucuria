<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class FilterItem extends Component
{

    public $item;
    
    public function __construct($item = '')
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('components.cards.filter-item');
    }
}
