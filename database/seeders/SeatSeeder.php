<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Deleting Seats Table Before New Seeding
        DB::table('seats')->delete();

        //Creating 10 Seats (from 31 to 40) as a Default
        for ($i=31; $i <= 40; $i++) {
            DB::table('seats')->insert([
                'number' =>$i ,
            ]);
        }
    }
}
