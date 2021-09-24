<?php

namespace Tests\Feature;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;


class AuthFeatureTest extends TestCase
{
    use RefreshDatabase;

    private $user ;
    public function setUp(): void
    {
        parent::setUp();
        $this->user=User::factory()->create();
    }


    /**
     *  Register Validation Test
     */
    public function test_register_should_be_validated()
    {
        $response = $this->postJson(route('register'));
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    /**
     *  Register Test
     */
    public function test_new_user_can_register()
    {
        $response = $this->postJson(route('register'), [
            'name'              => "ehsan dastras",
            'phone_number'      => "09374939748",
            'password'          => "12345678",
        ]);
        $response->assertStatus(Response::HTTP_CREATED);
    }
    /**
     *  Login Validation Test
     */
    public function test_login_should_be_validated()
    {
        $response = $this->postJson(route('login'));
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    /**
     * Test log out user
     */
    public function test_logged_in_user_can_logout()
    {
        //behavior as a registered user
        $response=$this->actingAs($this->user)->postJson(route('logout'));
        $response->assertStatus(Response::HTTP_OK);
    }


}
