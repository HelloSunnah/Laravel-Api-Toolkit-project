<?php

namespace App\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;

class CreateMeetingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'host' => ['required', 'integer'],
            'date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i:s'],
            'end_time' => ['required', 'date_format:H:i:s'],
            'timezone' => ['nullable', 'string'],
            'company_id' => ['required', 'integer'],
            'client_id' => ['required', 'integer'],
            'project_id' => ['required', 'integer'],
            'location_id' => ['nullable', 'integer'],
            'status' => ['required', 'integer'],
            'meeting_status' => ['nullable', 'integer'],
            'participants' => ['nullable', 'array'],
            'participants.*' => ['integer'],
            'attachments' => ['nullable', 'array'],
            'attachment_title' => ['nullable', 'array'],
            'attachment_title.*' => ['nullable', 'string'],
            'meeting_type' => ['nullable'],
        ];
    }
}
