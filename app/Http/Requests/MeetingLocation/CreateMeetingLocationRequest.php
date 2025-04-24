<?php

namespace App\Http\Requests\MeetingLocation;

use Illuminate\Foundation\Http\FormRequest;

class CreateMeetingLocationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => ['required', 'integer'],
			'name' => ['required', 'string'],
			'description' => ['nullable', 'string'],
			'total_seat' => ['nullable', 'integer'],
			'serial' => ['nullable', 'integer'],
			'status' => ['nullable', 'integer'],
        ];
    }
}
