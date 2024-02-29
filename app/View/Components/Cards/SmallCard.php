<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class SmallCard extends Component
{
    public $image;
    public $link;

    public function __construct($image = '', $link = '')
    {
        $this->image = $image;
        $this->link = $link;
    }

    public function render()
    {
        return view('components.cards.small-card');
    }
}
