<?php

namespace App\Http\Requests\Agenda;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgendaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'agenda_id' => ['sometimes'],
			'meeting_id' => ['sometimes'],
			'title' => ['sometimes', 'string'],
			'description' => ['sometimes', 'string'],
			'company_id' => ['sometimes', 'integer'],
        ];
    }
}
