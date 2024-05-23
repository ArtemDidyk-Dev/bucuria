<?php

namespace App\Models;

use App\FastAdminPanel\Models\MultilanguageModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends MultilanguageModel
{
    use HasFactory;

    protected $table = 'tags';
}
