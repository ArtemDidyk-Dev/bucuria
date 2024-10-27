<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CatalogService;
use App\View\Components\Cards\FilterCategories;
use Illuminate\Http\Request;
use App\View\Components\Inc\Pagination;
use App\View\Components\Cards\CardItems;
use App\View\Components\Catalog\Filters;

class CatalogController extends Controller
{
    public function catalog(Request $r)
    {

        $slugProduct = $r->query('category') ?? [];
        $catalogService = new CatalogService($slugProduct);
        $page = $r->get('page', 1);
        $pagesize = $catalogService::PAGESIZE;
        $paglink = $r->fullUrlWithoutQuery('page');
        $categories = Category::get()->each(function($item) use ($slugProduct) {
            if (in_array($item->slug, $slugProduct)) {
                $item->active = true;
            }
        });

        $tastes = $catalogService->getTastesWithCount();
        $weights = $catalogService->getWeightsWithCount();
        $activeTastes = $tastes->where('active', true);
        $activeWeights = $weights->where('active', true);
        [$products, $count] = $catalogService->getProducts();

        $clearRoute = $catalogService->getClearRoute();
        $weightsMin = ($r->has('minWidth')) ? $r->get('minWidth') : $catalogService->parseWeightsValue($weights, 'min');
        $weightsMax = ($r->has('maxWidth')) ? $r->get('maxWidth') : $catalogService->parseWeightsValue($weights, 'max');
        if ($r->isMethod('post')) {
            $categories_component = new FilterCategories($categories);
            $items_component = new CardItems($products);
            $pagination_component = new Pagination($count, $pagesize, $page, $paglink, true);
            $filters_component = new Filters($r, $tastes, $weights, $clearRoute, $activeTastes, $activeWeights, $r->has('category'),$weightsMin,$weightsMax);
            return $this->response([
                'html' => $items_component->render(),
                'pagination' => $pagination_component->render(),
                'filters' => $filters_component->render(),
                'categories' => $categories_component->render(),
            ]);
        }

        $breadcrumbs = $catalogService->getBreadcrumbs();
        $h1 = $catalogService->getH1();
        [$metaTitle, $metaDescription, $metaKeywords] = $catalogService->getMeta();

        return view('pages.catalog', [
            'page' => $page,
            'pagesize' => $pagesize,
            'paglink' => $paglink,
            'count' => $count,
            'products' => $products,
            'categories' => $categories,
            'activeCategory' => $r->has('category'),
            'clearRoute' => $clearRoute,
            'tastes' => $tastes,
            'weights' => $weights,
            'activeTastes' => $activeTastes,
            'activeWeights' => $activeWeights,
            'breadcrumbs' => $breadcrumbs,
            'h1' => $h1,
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
            'metaKeywords' => $metaKeywords,
            'weightsMin' =>  $weightsMin,
            'weightsMax' =>  $weightsMax,
        ]);
    }
}
