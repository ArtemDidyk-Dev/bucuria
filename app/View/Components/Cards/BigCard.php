<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class BigCard extends Component
{
    public $title;
    public $description;
    public $image;
    public $imagemob;

    public function __construct($title = '', $description = '', $image = '', $imagemob = '')
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->imagemob = $imagemob;
    }

    public function render()
    {
        return view('components.cards.big-card');
    }
}
