<?php

namespace App\Http\Requests\Notes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'meeting_id' => ['sometimes'],
			'user_id' => ['sometimes'],
			'content' => ['sometimes', 'string'],
			'company_id' => ['sometimes', 'integer'],
        ];
    }
}
