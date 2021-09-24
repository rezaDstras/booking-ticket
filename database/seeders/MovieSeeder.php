<?php

namespace Database\Seeders;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Deleting Movies Table Before New Seeding
        DB::table('movies')->delete();

        //Creating 5 moves as a Default
        DB::table('movies')->insert( [
            [
                'id' => 1,
                'title' => 'Children of heaven',
                'release_year' => 1997,
                'play_date'=> Carbon::createFromDate('2018/4/20'),
                'play_time' => Carbon::parse('22:00'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id' => 2,
                'title' => 'About Elly',
                'release_year' => 2009,
                'play_date' => Carbon::createFromDate('2018/4/20'),
                'play_time' =>Carbon::parse('22:00'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id' => 3,
                'title' => 'A separation',
                'release_year' => 2011,
                'play_date' => Carbon::createFromDate('2018/4/22'),
                'play_time' =>Carbon::parse('18:00'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id' => 4,
                'title' => 'The salesman',
                'release_year' => 2016,
                'play_date' => Carbon::createFromDate('2018/4/21'),
                'play_time' => Carbon::parse('18:00'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id' => 5,
                'title' => 'The Elephant king',
                'release_year' => 2017,
                'play_date' => Carbon::createFromDate('2018/4/21'),
                'play_time' =>Carbon::parse('20:00'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ]);

    }
}
