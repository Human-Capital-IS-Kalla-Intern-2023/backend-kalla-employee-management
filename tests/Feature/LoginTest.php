<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_login()
    {
        $data = [
            'email' => 'admin@hcis.com',
            'password' => 'password',
        ];

        $this->post(route('/api/login'), $data)
            ->assertStatus(200)
            ->assertSessionHasNoErrors()
            ->assertAuthenticated(); // Check that the user is authenticated after a successful login.
    }
}
