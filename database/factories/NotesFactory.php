<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'note_id' => createOrRandomFactory(\App\Models\Note::class),
			'meeting_id' => createOrRandomFactory(\App\Models\Meeting::class),
			'user_id' => createOrRandomFactory(\App\Models\User::class),
			'content' => $this->faker->text(),
			'company_id' => createOrRandomFactory(\App\Models\Company::class),
        ];
    }
}
