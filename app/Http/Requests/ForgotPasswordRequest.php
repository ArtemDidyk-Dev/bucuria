<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
		$rules = [
			'email'			        => ['required', 'email'],
			'code'			        => ['required'],
			'password'              => ['required', 'min:6'],
			'password_confirmation' => ['required', 'min:6', 'same:password']
        ];

        return $rules;
    }
}
