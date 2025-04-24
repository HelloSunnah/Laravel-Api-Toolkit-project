<?php

namespace App\Http\Requests\Notes;

use Illuminate\Foundation\Http\FormRequest;

class CreateNotesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'meeting_id' => ['required'],
			'user_id' => ['required'],
			'content' => ['nullable', 'string'],
			'company_id' => ['required', 'integer'],
        ];
    }
}
