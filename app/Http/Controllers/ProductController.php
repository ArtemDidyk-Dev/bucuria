<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product($slug = '', Offer $offer)
    {
        $offer = $offer->getBySlug($slug);
        $offers = $offer->product->offers;

        $tastes = $offers->pluck('taste')->flatten()->unique();
        $weights = $offers->where('taste.id', $offer->taste->id ?? 0)->pluck('weight')->flatten();

        $tastes = $tastes->each(function($item) use ($offer, $offers) {
            if ($offer->taste && $item->id == $offer->taste->id) {
                $item->active = true;
            }
            if ($item) {
                $item->offer = $offers->where('taste.id', $item->id)->where('id', '!=', $offer->id)->first();
            }
        });

        $tastes = $tastes->filter(function($item) {
            return !empty($item);
        });

        $weights = $weights->each(function($item) use ($offer, $offers) {
            if ($offer->weight && $item->id == $offer->weight->id) {
                $item->active = true;
            }
            if ($item) {
                $item->offer = $offers->where('weight.id', $item->id)->where('taste.id', $offer->taste->id ?? 0)->first();
            }
        })->sortBy('title');

        $weights = $weights->filter(function($item) {
            return !empty($item);
        });

        return view('pages.product', [
            'offer'     => $offer,
            'tastes'    => $tastes,
            'weights'   => $weights,
        ]);
    }
}
