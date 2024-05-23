<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
            'type'  => strval($this->type),
            'department' => strval($this->department),
        ]);
    }

    public function rules()
    {
        $rules = [
            'name'      => ['required', 'string'],
            'email'     => ['required', 'email'],
            'type'      => ['nullable'],
            'message'   => ['required', 'string'],
            'file'	    => ['nullable', 'mimes:png,jpg,jpeg,pdf,docx,doc'],
            'department' => ['nullable'],
        ];

        return $rules;
    }
}
