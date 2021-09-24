<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\Seat;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class TicketFeatureTest extends TestCase
{
    use RefreshDatabase;


    private $user ;
    private $movie ;
    private $seat ;
    public function setUp(): void
    {
        parent::setUp();
        $this->movie=Movie::factory()->create();
        $this->seat=Seat::factory()->create();
        $this->user=User::factory()->create();
        Sanctum::actingAs($this->user);
    }

    /**
     * ticket should be validated
     *
     */
    public function test_ticket_should_be_validated()
    {
        $response = $this->postJson(route('ticket.store'),[]);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors(['seat_id','movie_id']);
    }

    /**
     * ticket could be created
     *
     */
    public function test_ticket_could_be_created()
    {
        $response = $this->postJson(route('ticket.store'),[
            'movie_id' => $this->movie->id,
            'seat_id'  => $this->seat->id,
        ]);
        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * ticket must not be created with identical seat number for movie
     *
     */
    public function test_ticket_must_not_be_created_with_identical_seat_number_for_movie()
    {
        //First Of All Crating Default Ticket
        Ticket::factory()->create([
            'movie_id'  =>$this->movie->id,
            'seat_id'   =>$this->seat->id,
            'user_id'   =>$this->user->id
        ]);

        //After That Crating Ticket Like A Default Created Ticket
        $response = $this->postJson(route('ticket.store', [
            'movie_id'  =>$this->movie->id,
            'seat_id'   =>$this->seat->id,
            'user_id'   =>$this->user->id,
        ]));

        //Ticket Should Not be created With Identical Seat Number
        $response->assertStatus(Response::HTTP_FORBIDDEN);

    }
}
