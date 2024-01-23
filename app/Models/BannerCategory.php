<?php

namespace App\Models;

use App\FastAdminPanel\Models\MultilanguageModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerCategory extends MultilanguageModel
{
    use HasFactory;

    protected $table = 'banners_categories';
}
