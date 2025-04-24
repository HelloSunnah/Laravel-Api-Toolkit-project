<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'agenda_id' => createOrRandomFactory(\App\Models\Agenda::class),
			'meeting_id' => createOrRandomFactory(\App\Models\Meeting::class),
			'title' => $this->faker->firstName(),
			'description' => $this->faker->text(),
			'company_id' => createOrRandomFactory(\App\Models\Company::class),
        ];
    }
}
