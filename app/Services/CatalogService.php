<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Taste;
use App\Models\Weight;
use Illuminate\Support\Collection;
use Single;

class CatalogService
{
    private $page;
    private $slugParams;
    private $paglink;
    private $tastes;
    private $weights;
    private $activeTastes;
    private $activeWeights;
    private $categories;
    private $taste;
    private $weight;

    public const PAGESIZE = 24;

    public function __construct(?array $categories)
    {
        $this->categories = Category::whereIn('slug', $categories ?? [])->get();
        $this->page = request()->get('page', 1);
        $this->taste = request()->get('taste', '');
        $this->weight = request()->get('weight', '');

        $slugParams = request()->all();
        $this->slugParams = $slugParams;

        $this->paglink = request()->fullUrlWithoutQuery('page');
    }

    public function getProducts()
    {
        $query = $this->getOffersQuery()
            ->with('weight')
            ->with('tags')
            ->with('product');

        $this->loadTastes($query);
        $this->loadWeights($query);

        $count = $query->count();

        $products = $query
            ->skip(($this->page - 1) * self::PAGESIZE)
            ->limit(self::PAGESIZE)
            ->get();

        return [$products, $count];
    }

    private function getOffersQuery()
    {
        return Offer::query()
            ->whereIn('id_products', $this->loadProductsIdsQueryByCategory());
    }

    private function loadProductsIdsQueryByCategory()
    {
        return Product::query()
            ->select('id')
            ->when($this->categories->isNotEmpty(), function ($q) {
                $q->whereIn('id_categories', $this->categories->pluck('id')->toArray());
            })->get();
    }

    public function getTastes()
    {
        if ($this->tastes !== null) {
            return $this->tastes;
        }

        $query = $this->getOffersQuery();
        $this->loadWeights($query);

        $tastes = Taste::whereIn('id', $query->select('id_tastes'))
            ->orderBy('title', 'ASC')
            ->get();

        $activeTastesSlug = !empty($this->taste) ? explode(',', $this->taste) : [];

        $this->tastes = $tastes->each(function ($item) use ($activeTastesSlug) {

            $filterLink = parse_url(rawurldecode($this->paglink))['path'];
            $filterLinkParams = [
                'taste' => implode(',', $activeTastesSlug),
                ...$this->slugParams,
            ];

            if (in_array($item->slug, $activeTastesSlug)) {

                $item->active = true;

                unset($activeTastesSlug[array_search($item->slug, $activeTastesSlug)]);
                if (!empty($activeTastesSlug)) {
                    $filterLinkParams['taste'] = implode(',', $activeTastesSlug);
                } else {
                    unset($filterLinkParams['taste']);
                }

            } else {

                $activeTastesSlug[] = $item->slug;
                $filterLinkParams['taste'] = implode(',', $activeTastesSlug);
                unset($activeTastesSlug[array_search($item->slug, $activeTastesSlug)]);
            }

            $params = rawurldecode(http_build_query($filterLinkParams));
            $item->link = $filterLink.($params ? '?'.$params : '');
        });

        return $this->tastes;
    }

    public function getTastesWithCount()
    {
        $productsIdsQuery = $this->getOffersQuery()->select('id', 'id_tastes');
        $this->loadWeights($productsIdsQuery);

        $offersTastes = $productsIdsQuery->get()->groupBy('id_tastes');

        return $this->getTastes()->each(function ($taste) use ($offersTastes) {
            $taste->products_count = isset($offersTastes[$taste->id]) ? $offersTastes[$taste->id]->count() : 0;
        });
    }

    private function getActiveTastesIds()
    {
        if ($this->activeTastes !== null) {
            return $this->activeTastes;
        }

        $activeTastesSlug = !empty($this->taste) ? explode(',', $this->taste) : [];

        $this->activeTastes = Taste::whereIn('slug', $activeTastesSlug)
            ->get('id')
            ->pluck('id');

        return $this->activeTastes;
    }

    public function loadTastes($query)
    {
        $activeTastesIds = $this->getActiveTastesIds();

        if ($activeTastesIds->isNotEmpty()) {
            $query->whereIn('id_tastes', $this->getActiveTastesIds());
        }
    }

    public function getWeights()
    {
        if ($this->weights !== null) {
            return $this->weights;
        }

        $query = $this->getOffersQuery();
        $this->loadTastes($query);

        $weights = Weight::whereIn('id', $query->select('id_weights'))
            ->orderBy('title', 'ASC')
            ->get();

        $activeWeightsSlug = !empty($this->weight) ? explode(',', $this->weight) : [];

        $this->weights = $weights->each(function ($item) use ($activeWeightsSlug) {

            $filterLink = parse_url(rawurldecode($this->paglink))['path'];
            $filterLinkParams = [
                'weight' => implode(',', $activeWeightsSlug),
                ...$this->slugParams,
            ];

            if (in_array($item->slug, $activeWeightsSlug)) {

                $item->active = true;

                unset($activeWeightsSlug[array_search($item->slug, $activeWeightsSlug)]);
                if (!empty($activeWeightsSlug)) {
                    $filterLinkParams['weight'] = implode(',', $activeWeightsSlug);
                } else {
                    unset($filterLinkParams['weight']);
                }

            } else {

                $activeWeightsSlug[] = $item->slug;
                $filterLinkParams['weight'] = implode(',', $activeWeightsSlug);
                unset($activeWeightsSlug[array_search($item->slug, $activeWeightsSlug)]);
            }

            $params = rawurldecode(http_build_query($filterLinkParams));
            $item->link = $filterLink.($params ? '?'.$params : '');
        });

        return $this->weights;
    }

    public function getWeightsWithCount()
    {
        $productsIdsQuery = $this->getOffersQuery()->select('id', 'id_weights');
        $this->loadTastes($productsIdsQuery);

        $offersWeights = $productsIdsQuery->get()->groupBy('id_weights');

        return $this->getWeights()->each(function ($weight) use ($offersWeights) {
            $weight->products_count = isset($offersWeights[$weight->id]) ? $offersWeights[$weight->id]->count() : 0;
        });
    }

    private function getActiveWeightsIds()
    {
        if ($this->activeWeights !== null) {
            return $this->activeWeights;
        }

        $activeWeightsSlug = !empty($this->weight) ? explode(',', $this->weight) : [];

        $this->activeWeights = Weight::whereIn('slug', $activeWeightsSlug)
            ->get(['id'])
            ->pluck('id');

        return $this->activeWeights;
    }

    public function loadWeights($query)
    {
        $activeWeightsIds = $this->getActiveWeightsIds();

        if ($activeWeightsIds->isNotEmpty()) {
            $query->whereIn('id_weights', $this->getActiveWeightsIds());
        }
    }

    public function getClearRoute()
    {
        return route('catalog', [], false);
    }

    public function getBreadcrumbs()
    {
        $s = new Single('Продукты', 10, 1);

        $breadcrumbs = [
            [
                'title' => $s->field('Каталог', 'Заголовок', 'text', true, 'Catalog'),
                'link' => route('catalog', [], false),
            ],
        ];


        return $breadcrumbs;
    }

    public function getH1()
    {
        $s = new Single('Продукты', 10, 1);


        return $s->field('Каталог', 'Заголовок', 'text', true, 'Catalog');
    }

    public function getMeta()
    {
        $s = new Single('Продукты', 10, 1);

        return [
            $s->field('Каталог Meta', 'Meta Title', 'textarea', true, 'Bucuria | Catalog'),
            $s->field('Каталог Meta', 'Meta Description', 'textarea', true, 'Bucuria | Catalog'),
            $s->field('Каталог Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | Catalog'),
        ];
    }
}
