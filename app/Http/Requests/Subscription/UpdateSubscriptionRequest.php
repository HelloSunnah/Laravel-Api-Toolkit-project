<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['sometimes', 'integer'],
			'company_id' => ['sometimes'],
			'subscription_type' => ['sometimes', 'string'],
			'subscription_start_date' => ['sometimes', 'date'],
			'subscription_end_date' => ['sometimes', 'date'],
			'subscriptionStatus' => ['sometimes', 'integer'],
			'remarks' => ['sometimes', 'string'],
			'activeStatus' => ['sometimes', 'integer'],
        ];
    }
}
