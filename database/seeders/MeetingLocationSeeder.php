<?php

namespace Database\Seeders;

use App\Models\MeetingLocation;
use Illuminate\Database\Seeder;

class MeetingLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        MeetingLocation::factory(10)->create();
    }
}
