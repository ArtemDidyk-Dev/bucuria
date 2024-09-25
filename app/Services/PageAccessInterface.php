<?php

namespace App\Services;

use App\Models\Standart;
use Illuminate\Http\Request;

interface PageAccessInterface
{
    public function isAccess(Standart $standart,  Request $request);

    public function access(Standart $standart,  Request $request);

}
