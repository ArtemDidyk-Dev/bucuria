<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class Video extends Component
{
    public $video;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($video = '')
    {
        $this->video = $video;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.video');
    }
}
