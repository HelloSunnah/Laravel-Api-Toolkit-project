<?php

namespace App\Http\Requests\Agenda;

use Illuminate\Foundation\Http\FormRequest;

class CreateAgendaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'meeting_id' => ['required'],
			'title' => ['required', 'string'],
			'description' => ['required', 'string'],
			'company_id' => ['required', 'integer'],
        ];
    }
}
