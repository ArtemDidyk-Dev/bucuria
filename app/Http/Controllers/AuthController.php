<?php

namespace App\Http\Controllers;

use App\Events\SendCode;
use App\Events\SendLoyaltyCode;
use App\Http\Requests\ForgotCodeRequest;
use App\Http\Requests\ForgotEmailRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterLoyaltyRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{

	public function register(RegisterRequest $r)
	{
		$data = $r->validated();

		if (!empty($data['loyalty_code'])) {
			$checkAvailable = User::where('loyalty_code', $data['loyalty_code'])
			->first();

			if (!empty($checkAvailable)) {
				return $this->error(['loyalty_code' => true]);
			}
		}

		$data['id_roles'] = 2;
		$data['password'] = Hash::make($data['password']);

		$user = new User($data);
		$user->save();

		return $this->response();
	}

	public function registerLoyalty(RegisterLoyaltyRequest $r)
	{
		$data = $r->validated();

		$user = User::where('email', $data['email'])
		->first();

		if (empty($user)) {
			$data['id_roles'] = 2;
			$user = new User($data);
			$user->save();
		}

		$user->setLoyaltyCode();

		SendLoyaltyCode::dispatch($user);

		return $this->response();
	}

	public function login(LoginRequest $r)
	{	
		$data = $r->validated();
		
		if (Auth::attempt($data)) {

			return $this->response([
				'redirect'	=> route('account', '', false),
			]);
		}

		return $this->error();
	}
	
	public function sendCode(ForgotEmailRequest $r)
	{
		$data = $r->validated();

		$user = User::where('email', $data['email'])
		->first();

		if (empty($user)) {
			return $this->error();
		}

		$user->setCode();

		SendCode::dispatch($user);

		return $this->response();
	}

	public function checkCode(ForgotCodeRequest $r)
	{
		$data = $r->validated();

		$user = User::where('email', $data['email'])
		->where('code', $data['code'])
		->first();

		if (empty($user)) {
			return $this->error([]);
		}

		return $this->response([]);
	}

	public function changePassword(ForgotPasswordRequest $r)
	{	
		$data = $r->validated();

		$user = User::where('email', $data['email'])
		->where('code', $data['code'])
		->first();

		if (empty($user)) {
			return $this->error([]);
		}

		$user->changePassword($data['password']);

		return $this->response([]);
	}

	public function logout()
	{
		Auth::logout();

		return $this->response([
			'link'	=> route('home', [], true),
		]);
	}
}