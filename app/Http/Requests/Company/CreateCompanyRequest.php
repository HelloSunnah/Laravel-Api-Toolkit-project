<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
			'abbreviation' => ['nullable', 'string'],
			'description' => ['nullable', 'string'],
			'slogan' => ['nullable', 'string'],
			'details' => ['nullable', 'string'],
			'address' => ['nullable', 'string'],
			'website' => ['nullable', 'string'],
			'phone_1' => ['nullable', 'string'],
			'phone_2' => ['nullable', 'string'],
			'phone_3' => ['nullable', 'string'],
			'mobile' => ['nullable', 'string'],
			'email' => ['nullable', 'email', 'string'],
        ];
    }
}
