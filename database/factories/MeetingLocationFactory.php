<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingLocationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => createOrRandomFactory(\App\Models\Company::class),
			'name' => $this->faker->firstName(),
			'description' => $this->faker->text(),
			'total_seat' => $this->faker->randomNumber(),
			'serial' => $this->faker->randomNumber(),
			'status' => $this->faker->randomNumber(),
        ];
    }
}
