<?php

namespace App\Models;

use App\FastAdminPanel\Models\MultilanguageModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standart extends MultilanguageModel
{
    protected $table = 'standart';
    use HasFactory;

    public function getBySlug($slug)
    {

        $page = $this->where('slug', $slug)
            ->first();

        return $page;
    }
}
