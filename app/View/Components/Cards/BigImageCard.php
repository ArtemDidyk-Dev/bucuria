<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class BigImageCard extends Component
{
    public $title;
    public $description;
    public $btnText;
    public $center;
    public $image;
    public $imagemob;
    public $gradient;
    public $descriptionBlockRight;
    public $descriptionBlockTitle;
    public $descriptionBlockDesc;
    public $link;
    public $red;

    public function __construct($title = '', $description = '', $btnText = '', $center = null, $red = false, $image = '', $imagemob = '', $gradient = '', $descriptionBlockRight = '', $descriptionBlockTitle = '', $descriptionBlockDesc = '', $link = '')
    {
        $this->title = $title;
        $this->description = $description;
        $this->btnText = $btnText;
        $this->center = $center;
        $this->image = $image;
        $this->imagemob = $imagemob;
        $this->gradient = $gradient;
        $this->descriptionBlockRight = $descriptionBlockRight;
        $this->descriptionBlockTitle = $descriptionBlockTitle;
        $this->descriptionBlockDesc = $descriptionBlockDesc;
        $this->link = $link;
        $this->red = $red;
    }
    
    public function render()
    {
        return view('components.cards.big-image-card');
    }
}
