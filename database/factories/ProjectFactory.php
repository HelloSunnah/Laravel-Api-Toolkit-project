<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => createOrRandomFactory(\App\Models\Company::class),
			'client_id' => createOrRandomFactory(\App\Models\Client::class),
			'name' => $this->faker->firstName(),
			'description' => $this->faker->text(),
			'owner_name' => $this->faker->firstName(),
			'start_time' => $this->faker->time(),
			'end_time' => $this->faker->time(),
			'status' => $this->faker->randomNumber(),
        ];
    }
}
