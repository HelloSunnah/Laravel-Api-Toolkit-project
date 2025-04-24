<?php

namespace App\Http\Resources\Notes;

use Illuminate\Http\Resources\Json\JsonResource;

class NotesResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'note_id' => $this->note_id,
			'meeting_id' => $this->meeting_id,
			'user_id' => $this->user_id,
			'content' => $this->content,
			'company_id' => $this->company_id,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
