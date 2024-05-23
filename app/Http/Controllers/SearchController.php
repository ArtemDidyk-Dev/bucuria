<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Illuminate\Http\Request;
use App\View\Components\Inc\Pagination;
use App\View\Components\Cards\CardItems;
use App\View\Components\Inc\SearchItems;

class SearchController extends Controller
{
    public function search (Request $r) {

		$value = $r->get('s', '');
		$searchService = new SearchService($value);

        $page = $r->get('page', 1);
        $pagesize = $searchService::PAGESIZE;
        $paglink = route('search', ['s' => $value], false);

        [$products, $count] = $searchService->getProducts();

        if ($r->isMethod('post')) {
            $items_component = new CardItems($products);
            $pagination_component = new Pagination($count, $pagesize, $page, $paglink, true);

            return $this->response([
                'html' => $items_component->render(),
                'pagination' => $pagination_component->render(),
            ]);
        }

		return view('pages.search', [
			'page' => $page,
            'pagesize' => $pagesize,
            'paglink' => $paglink,
            'count' => $count,
            'products'  => $products,
            'value' => $value,
		]); 
	}

    public function apiSearch(Request $r)
	{
		$value = $r->get('value', '');

		$searchService = new SearchService($value);
		$items = $searchService->getSearchItems();

		$searchItemsComponent = new SearchItems($items, $value);

		return $this->response([
			'search_items'	=> $searchItemsComponent->render(),
		]);
	}
}
