<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Models\Category;
use App\Models\Ingradient;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Standart;
use Lang;

class SitemapController extends Controller
{
	private $domain;
	private $sitemap = [];

	public function __construct()
	{
		$this->domain = env('APP_URL');
	}

	public function index() {


		$this->add_url('', '1.0');

		$this->add_url('/ingradients', '1.0');
		$this->add_url('/aboutus', '1.0');
		$this->add_url('/history', '1.0');
		$this->add_url('/career', '1.0');
		$this->add_url('/contact', '1.0');
		$this->add_url('/certificates', '1.0');
		$this->add_url('/shops', '1.0');
		$this->add_url('/suppliers', '1.0');
		$this->add_url('/catalog', '1.0');

		$ingradients = Ingradient::select('slug')->get();
		foreach ($ingradients as $ingradient) {
			$this->add_url(route('ingradient', $ingradient->slug, false), '0.5');
		}

		$categories = Category::select('slug')->get();
		foreach ($categories as $category) {
			$this->add_url(route('catalog', $category->slug, false), '0.5');
		}

		$products = Offer::select('slug')->get();
		foreach ($products as $product) {
			$this->add_url(route('product', $product->slug, false), '0.5');
		}

		$standarts = Standart::select('slug')->get();
		foreach ($standarts as $standart) {
			$this->add_url(route('standart', $standart->slug, false), '0.5');
		}
		
		$response = Response::make(view('pages.sitemap', 
		[
			'sitemap' => $this->sitemap,
		])->render());
		$response->header('Content-Type', 'text/xhtml+xml; charset=utf-8');
		return $response;

	}

	private function add_url($url, $priority, $is_multilanguage = true) {

		$this->sitemap[] = [
			'slug' 					=> $this->domain.$url, 
			'priority' 				=> $priority, 
			'is_multilanguage' 		=> $is_multilanguage && Lang::langs()->count() > 1,
		]; 
	}

}