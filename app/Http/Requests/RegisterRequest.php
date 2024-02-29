<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
 
	/**
	 * Prepare the data for validation.
	 *
	 * @return void
	 */
	protected function prepareForValidation()
	{
		$this->merge([
			'loyalty_code' 	=> strval($this->loyalty_code),
			'date'			=> empty(strval($this->date)) ? '0000-00-00' : $this->date,
		]);
	}

    public function rules()
	{
		$rules = [
			'name'					=> ['required', 'string'],
			'phone'					=> ['required', 'string', 'regex:/^[+()\- 0-9]+$/'],
			'email'					=> ['required', 'email', 'unique:users,email'],
			'date'			        => ['nullable'],
			'loyalty_code'			=> ['nullable','string'],
			'password'			    => ['required', 'nullable', 'min:6'],
			'password_confirmation' => ['required', 'nullable', 'min:6', 'same:password'],
        ];

        return $rules;
    }
}
