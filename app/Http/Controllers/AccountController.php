<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use Auth;
use Hash;

class AccountController extends Controller
{
    public function account()
    {
        $user = Auth::user();

        if (empty($user)) {
            abort(404);
        }

        return view('pages.personal-account', [
            'user'  => $user,
        ]);
    }

    public function edit(UserEditRequest $r)
	{	
		$data = $r->validated();

		$user = Auth::user();

		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->phone = $data['phone'];
		$user->date = $data['date'];
		
		if (!empty($data['password'])) {
			$user->password = Hash::make($data['password']);
		}

		$user->save();

		return $this->response();
	}
}
