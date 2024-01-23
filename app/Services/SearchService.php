<?php

namespace App\Services;

use App\Models\Offer;

class SearchService
{
    private $searchValue;
    private $page;

    public const PAGESIZE = 30;

    public function __construct($searchValue)
    {
        $this->page = request()->get('page', 1);
        $this->searchValue = $searchValue;
    }

    public function getProducts()
    {
        $query = Offer::query()
        ->where('title', 'LIKE', "%{$this->searchValue}%");

        $count = $query->count();

        $query = $query->with('weight')
        ->with('tags')
        ->with('product');

        $products = $query
        ->skip(($this->page - 1) * self::PAGESIZE)
        ->limit(self::PAGESIZE)
        ->get();

        return [$products, $count];
    }

    public function getSearchItems()
    {
        return Offer::where('title', 'LIKE', "%{$this->searchValue}%")
		->limit(5)
		->get();
    }
}