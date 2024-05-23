<?php

namespace App\Http\Controllers;

use App\Models\Ingradient;

class IngradientController extends Controller
{
    public function ingradients()
    {
        $ingradients = Ingradient::get();

        return view('pages.ingradients', [
            'ingradients'   => $ingradients,
        ]);
    }

    public function ingradient($slug)
    {
        $ingradientModel = new Ingradient();

        $ingradient = $ingradientModel->getBySlug($slug);

        if (empty($ingradient)) {
            abort(404);
        }

        return view('pages.ingradient', [
            'ingradient' => $ingradient,
        ]);
    }
}
