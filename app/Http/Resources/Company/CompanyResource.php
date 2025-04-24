<?php

namespace App\Http\Resources\Company;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
			'abbreviation' => $this->abbreviation,
			'description' => $this->description,
			'slogan' => $this->slogan,
			'details' => $this->details,
			'address' => $this->address,
			'website' => $this->website,
			'phone_1' => $this->phone_1,
			'phone_2' => $this->phone_2,
			'phone_3' => $this->phone_3,
			'mobile' => $this->mobile,
			'email' => $this->email,
			'status' => $this->status,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
