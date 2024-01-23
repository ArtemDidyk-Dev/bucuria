<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class HistoryCard extends Component
{
    public $title;
    public $year;
    public $description;
    public $image;
    public $count;

    public function __construct($title = '', $year = '', $description = '', $image = '', $count = '')
    {
        $this->title = $title;
        $this->year = $year;
        $this->description = $description;
        $this->image = $image;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.history-card');
    }
}
