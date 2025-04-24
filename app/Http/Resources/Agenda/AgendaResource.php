<?php

namespace App\Http\Resources\Agenda;

use Illuminate\Http\Resources\Json\JsonResource;

class AgendaResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'agenda_id' => $this->agenda_id,
			'meeting_id' => $this->meeting_id,
			'title' => $this->title,
			'description' => $this->description,
			'company_id' => $this->company_id,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
