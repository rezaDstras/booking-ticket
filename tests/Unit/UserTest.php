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

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function test_users_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users',[
                'id','name','phone_number','password',
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

        //  A ticket exists in a user's ticket collections.
        $this->assertTrue($user->tickets->contains($ticket));

        //  Count that a user tickets collection exists.
        $this->assertEquals(1, $user->tickets->count());

        //  Tickets are related to user and is a collection instance.
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->tickets);
    }

}
