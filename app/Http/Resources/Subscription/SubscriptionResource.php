<?php

namespace App\Http\Resources\Subscription;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
			'company_id' => $this->company_id,
			'subscription_type' => $this->subscription_type,
			'subscription_start_date' => dateTimeFormat($this->subscription_start_date),
			'subscription_end_date' => dateTimeFormat($this->subscription_end_date),
			'subscriptionStatus' => $this->subscriptionStatus,
			'remarks' => $this->remarks,
			'activeStatus' => $this->activeStatus,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
