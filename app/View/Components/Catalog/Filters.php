<?php

namespace App\View\Components\Catalog;

use Illuminate\View\Component;
use Illuminate\Http\Request;
class Filters extends Component
{
    public $tastes;
    public $weights;
    public $clearRoute;
    public $activeTastes;
    public $activeWeights;
    public $activeCategory;
    public $weightsMax;
    public $weightsMin;
    public bool $activeWeightsFilter;
    public function __construct(
        Request $request,
        $tastes = [],
        $weights = [],
        $clearRoute = '',
        $activeTastes = [],
        $activeWeights = [],
        $activeCategory = '',
        $weightsMin = '',
        $weightsMax = '',
    )
    {
        $this->tastes = $tastes;
        $this->weights = $weights;
        $this->clearRoute = $clearRoute;
        $this->activeTastes = $activeTastes;
        $this->activeWeights = $activeWeights;
        $this->activeCategory = $activeCategory;
        $this->weightsMin = $weightsMin;
        $this->weightsMax = $weightsMax;
        $this->activeWeightsFilter = $request->has(['minWidth', 'maxWidth']);
    }

    public function render()
    {

        return view('components.catalog.filters', [
            'tastes'        => $this->tastes,
            'weights'       => $this->weights,
            'clearRoute'    => $this->clearRoute,
            'activeTastes'  => $this->activeTastes,
            'activeWeights' => $this->activeWeights,
            'activeCategory' => $this->activeCategory,
            'weightsMin'    =>  $this->weightsMin,
            'weightsMax'     => $this->weightsMax,
            'activeWeightsFilter' => $this->activeWeightsFilter,
        ])->render();
    }
}
