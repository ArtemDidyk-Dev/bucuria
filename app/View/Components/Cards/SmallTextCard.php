<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class SmallTextCard extends Component
{
    public $image;
    public $imagemob;
    public $title;
    public $description;

    public function __construct($image = '', $imagemob = '', $title = '', $description = '')
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->imagemob = $imagemob;
    }

   
    public function render()
    {
        return view('components.cards.small-text-card');
    }
}
