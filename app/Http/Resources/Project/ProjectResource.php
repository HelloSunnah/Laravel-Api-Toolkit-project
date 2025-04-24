<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
			'client_id' => $this->client_id,
			'name' => $this->name,
			'description' => $this->description,
			'owner_name' => $this->owner_name,
			'start_time' => $this->start_time,
			'end_time' => $this->end_time,
			'status' => $this->status,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
