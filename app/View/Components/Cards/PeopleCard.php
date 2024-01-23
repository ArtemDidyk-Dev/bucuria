<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class PeopleCard extends Component
{
    public $name;
    public $description;
    public $phone;
    public $email;
    public $image;

    public function __construct($name = '', $description = '', $phone = '', $email = '', $image = '')
    {
        $this->name = $name;
        $this->description = $description;
        $this->phone = $phone;
        $this->email = $email;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.people-card');
    }
}
