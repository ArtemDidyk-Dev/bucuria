<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardItems extends Component
{
    public $items;

    public function __construct($items = [])
    {
        $this->items = $items;
    }

        public function render(): View|Closure|string
    {
        return view('components.cards.card-items', [
            'items' => $this->items,
        ])->render();
    }
}
