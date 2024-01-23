<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class DescriptionCard extends Component
{
    public $title;
    public $description;
    public $right;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '', $description = '', $right = '')
    {
        $this->title = $title;
        $this->description = $description;
        $this->right = $right;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.description-card');
    }
}
