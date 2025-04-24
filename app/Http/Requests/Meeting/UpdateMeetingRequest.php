<?php

namespace App\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'host' => ['nullable', 'integer'],
            'date' => ['nullable', 'date'],
            'start_time' => ['nullable', 'date_format:H:i:s'],
            'end_time' => ['nullable', 'date_format:H:i:s'],
            'timezone' => ['nullable', 'string'],
            'company_id' => ['nullable', 'integer'],
            'client_id' => ['nullable', 'integer'],
            'project_id' => ['nullable', 'integer'],
            'location_id' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer'],
            'meeting_status' => ['nullable', 'integer'],
            'participants' => ['nullable', 'array'],
            'participants.*' => ['integer'],
            'attachments' => ['nullable', 'array'],
            'attachment_title' => ['nullable', 'array'],
            'attachment_title.*' => ['nullable', 'string'],
            'meeting_type' => ['nullable', 'integer'],
        ];
    }
}
