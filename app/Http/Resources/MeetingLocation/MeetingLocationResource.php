<?php

namespace App\Http\Resources\MeetingLocation;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingLocationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
			'name' => $this->name,
			'description' => $this->description,
			'total_seat' => $this->total_seat,
			'serial' => $this->serial,
			'status' => $this->status,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
