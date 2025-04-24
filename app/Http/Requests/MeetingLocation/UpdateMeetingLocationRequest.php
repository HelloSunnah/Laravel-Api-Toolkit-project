<?php

namespace App\Http\Requests\MeetingLocation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingLocationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => ['sometimes', 'integer'],
			'name' => ['sometimes', 'string'],
			'description' => ['sometimes', 'string'],
			'total_seat' => ['sometimes', 'integer'],
			'serial' => ['sometimes', 'integer'],
			'status' => ['sometimes', 'integer'],
        ];
    }
}

