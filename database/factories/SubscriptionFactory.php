<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\App\Models\User::class),
			'company_id' => createOrRandomFactory(\App\Models\Company::class),
			'subscription_type' => $this->faker->firstName(),
			'subscription_start_date' => $this->faker->dateTime(),
			'subscription_end_date' => $this->faker->dateTime(),
			'subscriptionStatus' => $this->faker->randomNumber(),
			'remarks' => $this->faker->firstName(),
			'activeStatus' => $this->faker->randomNumber(),
        ];
    }
}
