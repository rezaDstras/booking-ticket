<?php

namespace Tests\Unit;

use App\Models\Movie;
use App\Models\Seat;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function test_movies_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('movies',[
                'id','title', 'release_year', 'play_date','play_time',
            ]),1);
    }

    /** @test */
    public function a_user_has_many_tickets()
    {
        $user    = User::factory()->create();
        $movie    = Movie::factory()->create();
        $seat    = Seat::factory()->create();
        $ticket = Ticket::factory()->create([
            'movie_id' => $movie->id,
            'user_id' => $user->id,
            'seat_id' => $seat->id,
        ]);

        //  A ticket exists in a movie's ticket collections.
        $this->assertTrue($movie->tickets->contains($ticket));

        //  Count that a movie tickets collection exists.
        $this->assertEquals(1, $movie->tickets->count());

        //  Tickets are related to movies and is a collection instance.
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $movie->tickets);
    }
}
