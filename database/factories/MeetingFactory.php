<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->firstName(),
			'organizer' => $this->faker->randomNumber(),
			'date' => $this->faker->dateTime(),
			'time' => $this->faker->time(),
			'timezone' => $this->faker->firstName(),
			'company_id' => createOrRandomFactory(\App\Models\Company::class),
			'meeting_id' => createOrRandomFactory(\App\Models\Meeting::class),
        ];
    }
}
