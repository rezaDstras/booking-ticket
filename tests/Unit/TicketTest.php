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

class TicketTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $user ;
    private $movie ;
    private $seat ;
    private $ticket;
    public function setUp(): void
    {
        parent::setUp();
        $this->movie=Movie::factory()->create();
        $this->seat=Seat::factory()->create();
        $this->user=User::factory()->create();
        $this->ticket = Ticket::factory()->create([
            'movie_id' => $this->movie->id,
            'user_id' => $this->user->id,
            'seat_id' => $this->seat->id,
        ]);
    }

    /** @test */
    public function test_tickets_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('tickets',[
                'id','movie_id','user_id','seat_id',
            ]),1);
    }
    /** @test */
    public function a_ticket_belongs_to_a_movie()
    {
        // Method 1: Test by count that a ticket has a parent relationship with movie
        $this->assertEquals(1, $this->ticket->movie->count());

        $this->assertInstanceOf(Movie::class, $this->ticket->movie);
    }
    /** @test */
    public function a_ticket_belongs_to_a_seat()
    {
        // Method 1: Test by count that a ticket has a parent relationship with seat
        $this->assertEquals(1, $this->ticket->seat->count());

        $this->assertInstanceOf(Seat::class, $this->ticket->seat);
    }
    /** @test */
    public function a_ticket_belongs_to_a_user()
    {
        // Method 1: Test by count that a ticket has a parent relationship with user
        $this->assertEquals(1, $this->ticket->user->count());

        $this->assertInstanceOf(User::class, $this->ticket->user);
    }
}
