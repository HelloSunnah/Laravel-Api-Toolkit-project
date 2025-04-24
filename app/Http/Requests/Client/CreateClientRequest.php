<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => ['required', 'integer'],
			'name' => ['required', 'string'],
			'abbreviation' => ['nullable', 'string'],
			'description' => ['nullable', 'string'],
			'details' => ['nullable', 'string'],
			'address' => ['nullable', 'string'],
			'website' => ['nullable', 'string'],
			'phone_1' => ['nullable', 'string'],
			'phone_2' => ['nullable', 'string'],
			'mobile' => ['nullable', 'string'],
			'email' => ['nullable', 'email', 'string'],
			'logo' => ['nullable', 'string'],
			'status' => ['nullable', 'integer'],
        ];
    }
}
