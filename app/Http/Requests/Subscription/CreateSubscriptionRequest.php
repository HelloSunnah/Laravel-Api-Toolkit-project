<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubscriptionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
			'company_id' => ['required'],
			'subscription_type' => ['required', 'string'],
			'subscription_start_date' => ['required', 'date'],
			'subscription_end_date' => ['required', 'date'],
			'subscriptionStatus' => ['required', 'integer'],
			'remarks' => ['required', 'string'],
			'activeStatus' => ['required', 'integer'],
        ];
    }
}
