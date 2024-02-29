<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserEditRequest extends FormRequest
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
			'name'			        => ['required', 'string'],
			'email'			        => ['required', 'email'],
			'phone'			        => ['required', 'string', 'regex:/^[+()\- 0-9]+$/'],
            'date'			        => ['required', 'date'],
			'password'			    => [Rule::requiredIf(!empty($this->password_confirmation)), 'nullable', 'min:6'],
			'password_confirmation' => [Rule::requiredIf(!empty($this->password)), 'nullable', 'min:6', 'same:password'],
        ];

        return $rules;
    }
}
