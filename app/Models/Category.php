<?php

namespace App\Models;

use App\FastAdminPanel\Models\MultilanguageModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends MultilanguageModel
{
    use HasFactory;

    protected $table = 'categories';

    public function banners()
    {
        return $this->hasMany(BannerCategory::class, 'id_categories');
    }
}
