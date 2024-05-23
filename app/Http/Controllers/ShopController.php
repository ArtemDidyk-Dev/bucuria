<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shops()
    {
        return view('pages.shops', []);
    }
}
