<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterCategories extends Component
{
    public $categories;

    public function __construct($categories = [])
    {
        $this->categories = $categories;

    }

    public function render(): View|Closure|string
    {
        return view('components.cards.filter-categories', ['categories' => $this->categories])->render();
    }
}
