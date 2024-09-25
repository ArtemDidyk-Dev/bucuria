<?php

namespace App\Services;

use App\Models\Standart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

final class PageAccess implements PageAccessInterface
{

    public function isAccess(Standart $standart, Request $request): bool
    {
        return $standart->password && !$request->session()->has('access');
    }

    public function access(Standart $standart, Request $request): void
    {
        $password = $request->get("password");
        if(Hash::check($password, $standart->password)) {
            $request->session()->put('access', true);
        }
    }
}
