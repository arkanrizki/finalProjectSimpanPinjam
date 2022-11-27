<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Nasabah;
use App\Models\Pekerjaan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Nasabah::factory(20)->create();
        // Pekerjaan::factory(20)->create();
    }
}
