<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class SmallCardImage extends Component
{
    public $image;

    public function __construct($image = '', $title = '', $description = '', $social = '')
    {
        $this->image = $image;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.small-card-image');
    }
}
