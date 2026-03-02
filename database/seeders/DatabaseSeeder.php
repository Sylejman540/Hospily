<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database with test fixtures
     * 
     * Creates:
     * - 2 facilities
     * - 1 admin per facility
     * - 1 clinician per facility
     * - 5 patients per facility
     * - 5 appointments per facility
     * - 2 alerts per facility
     */
    public function run(): void
    {
        $this->call([
            FacilitySeeder::class,
        ]);
    }
}
