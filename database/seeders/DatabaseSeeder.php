<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Call Created Seeder Classes To Run Seed
        $this->call([
            MovieSeeder::class,
            SeatSeeder::class
        ]);
    }
}
