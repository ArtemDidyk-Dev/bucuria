<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CatalogService;
use Illuminate\Http\Request;
use App\View\Components\Inc\Pagination;
use App\View\Components\Cards\CardItems;
use App\View\Components\Catalog\Filters;

class CatalogController extends Controller
{
    public function catalog (Request $r, Category $category) {

        $catalogService = new CatalogService($category);

        $page = $r->get('page', 1);
        $pagesize = $catalogService::PAGESIZE;
        $paglink = $r->fullUrlWithoutQuery('page');

        $categories = Category::get();
        $categories = $categories->each(function($item) use ($category) {
            if ($item->id == $category->id) {
                $item->active = true;
            }
        });

        $tastes = $catalogService->getTastesWithCount();
        $weights = $catalogService->getWeightsWithCount();
        $activeTastes = $tastes->where('active', true);
        $activeWeights = $weights->where('active', true);

        [$products, $count] = $catalogService->getProducts();

        $clearRoute = $catalogService->getClearRoute();

        if ($r->isMethod('post')) {
            $items_component = new CardItems($products);
            $pagination_component = new Pagination($count, $pagesize, $page, $paglink, true);
            $filters_component = new Filters($tastes, $weights, $clearRoute, $activeTastes, $activeWeights);

            return $this->response([
                'html' => $items_component->render(),
                'pagination' => $pagination_component->render(),
                'filters'   => $filters_component->render(),
            ]);
        }

        $breadcrumbs = $catalogService->getBreadcrumbs();
        $h1 = $catalogService->getH1();
        [$metaTitle, $metaDescription, $metaKeywords] = $catalogService->getMeta();

		return view('pages.catalog', [
			'page'              => $page,
            'pagesize'          => $pagesize,
            'paglink'           => $paglink,
            'count'             => $count,
            'products'          => $products,
            'categories'        => $categories,
            'clearRoute'        => $clearRoute,
            'tastes'            => $tastes,
            'weights'           => $weights,
            'activeTastes'      => $activeTastes,
            'activeWeights'     => $activeWeights,
            'breadcrumbs'       => $breadcrumbs,
            'category'          => $category,
            'h1'                => $h1,
            'metaTitle'         => $metaTitle,
            'metaDescription'   => $metaDescription,
            'metaKeywords'      => $metaKeywords,
		]); 
	}
}
