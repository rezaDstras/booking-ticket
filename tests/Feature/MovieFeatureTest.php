<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class MovieFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test all movies list should be accessible
     */
    public function test_all_movies_list_should_be_accessible()
    {
        $response=$this->get(route('index.movies'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * Test show available seats for each movie
     */
    public function test_show_available_seats_for_each_movie()
    {
        $movie=Movie::factory()->create();
        $response = $this->get(route('show.movie', [$movie->id]));
        $response->assertStatus(Response::HTTP_OK);
    }
}
