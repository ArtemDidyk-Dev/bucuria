<?php

namespace App\Models;

use App\FastAdminPanel\Models\MultilanguageModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingradient extends MultilanguageModel
{
    protected $table = 'ingradients';
    use HasFactory;

    public function getBySlug($slug)
    {

        return $this->where('slug', $slug)
            ->first();
    }
}
