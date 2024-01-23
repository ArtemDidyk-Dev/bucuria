<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class SmallSocialCard extends Component
{
    public $image;
    public $title;
    public $description;
    public $social;

    public function __construct($image = '', $title = '', $description = '', $social = '')
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->social = $social;
    }

   
    public function render()
    {
        return view('components.cards.small-social-card');
    }
}
