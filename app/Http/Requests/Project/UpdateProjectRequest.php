<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => ['sometimes', 'integer'],
			'client_id' => ['sometimes', 'integer'],
			'name' => ['sometimes', 'string'],
			'description' => ['nullable', 'string'],
			'owner_name' => ['nullable', 'string'],
			'start_time' => ['nullable', 'date_format:H:i:s'],
			'end_time' => ['nullable', 'date_format:H:i:s'],
			'status' => ['nullable', 'integer'],
        ];
    }
}
