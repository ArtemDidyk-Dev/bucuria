<?php

namespace App\View\Components\Catalog;

use Illuminate\View\Component;

class Filters extends Component
{
    public $tastes;
    public $weights;
    public $clearRoute;
    public $activeTastes;
    public $activeWeights;

    public function __construct($tastes = [], $weights = [], $clearRoute = '', $activeTastes = [], $activeWeights = [])
    {
        $this->tastes = $tastes;
        $this->weights = $weights;
        $this->clearRoute = $clearRoute;
        $this->activeTastes = $activeTastes;
        $this->activeWeights = $activeWeights;
    }

    public function render()
    {
        return view('components.catalog.filters', [
            'tastes'        => $this->tastes,
            'weights'       => $this->weights,
            'clearRoute'    => $this->clearRoute,
            'activeTastes'  => $this->activeTastes,
            'activeWeights' => $this->activeWeights,
        ])->render();
    }
}
