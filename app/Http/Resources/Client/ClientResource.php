<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
			'name' => $this->name,
			'abbreviation' => $this->abbreviation,
			'description' => $this->description,
			'details' => $this->details,
			'address' => $this->address,
			'website' => $this->website,
			'phone_1' => $this->phone_1,
			'phone_2' => $this->phone_2,
			'mobile' => $this->mobile,
			'email' => $this->email,
			'logo' => $this->logo,
			'status' => $this->status,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
