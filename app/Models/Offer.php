<?php

namespace App\Models;

use App\FastAdminPanel\Models\MultilanguageModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends MultilanguageModel
{

    protected $table = 'offers';

    use HasFactory;

    public function getBySlug($slug)
    {
        return $this->where('slug', $slug)
        ->with(['product' => function($q) {
            $q->with(['category' => function($q){
                $q->with('banners');
            }])
            ->with(['offers' => function($q) {
                $q->with('taste')
                ->with('weight');
            }]);
        }])
        ->with('taste')
        ->with('weight')
        ->first();
    }

    public function taste()
    {
        return $this->belongsTo(Taste::class, 'id_tastes');
    }

    public function weight()
    {
        return $this->belongsTo(Weight::class, 'id_weights');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_products');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'offers_tags', 'id_offers', 'id_tags');
    }
}
