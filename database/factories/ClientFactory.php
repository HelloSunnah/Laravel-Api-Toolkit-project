<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => createOrRandomFactory(\App\Models\Company::class),
			'name' => $this->faker->firstName(),
			'abbreviation' => $this->faker->firstName(),
			'description' => $this->faker->text(),
			'details' => $this->faker->firstName(),
			'address' => $this->faker->firstName(),
			'website' => $this->faker->firstName(),
			'phone_1' => $this->faker->firstName(),
			'phone_2' => $this->faker->firstName(),
			'mobile' => $this->faker->firstName(),
			'email' => $this->faker->safeEmail(),
			'logo' => $this->faker->firstName(),
			'status' => $this->faker->randomNumber(),
        ];
    }
}
