<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class ProductCatalogItem extends Component
{

    public $active;
    public $title;
    public $image;

    public function __construct($active = '', $title = '', $image = '')
    {
        $this->active = $active;
        $this->title = $title;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.product-catalog-item');
    }
}
