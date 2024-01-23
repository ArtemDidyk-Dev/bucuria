<?php

namespace App\View\Components\Inc;

use Illuminate\View\Component;

class SearchItems extends Component
{
    public $items;
    public $value;

    public function __construct($items = [], $value = '')
    {
        $this->items = $items;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.inc.search-items', [
            'items' => $this->items,
            'value' => $this->value,
        ])->render();
    }
}
