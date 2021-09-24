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

class SeatTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function test_Seats_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('seats',[
                'id','number', 'total',
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

        // A ticket exists in a seat's ticket collections.
        $this->assertTrue($seat->tickets->contains($ticket));

        // Count that a seat tickets collection exists.
        $this->assertEquals(1, $seat->tickets->count());

        // Tickets are related to seat and is a collection instance.
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $seat->tickets);
    }
}
