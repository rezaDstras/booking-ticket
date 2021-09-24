<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class SeatFeatureTest extends TestCase
{
    use RefreshDatabase;

    private $user ;
    public function setUp(): void
    {
        parent::setUp();
        $this->user=User::factory()->create();
    }
    /**
     * Test logged in user could be able to show seat statistics
     */
    public function test_logged_in_user_only_could_show_Seat()
    {
        //behavior as a registered user
        $response=$this->actingAs($this->user)->get(route('seatStatistics'));
        $response->assertStatus(Response::HTTP_OK);
    }
}
