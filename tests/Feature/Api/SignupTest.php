<?php

namespace Tests\Feature\Api;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SignupTest extends TestCase
{
    public function tearDown(): void
    {
        DB::delete("DELETE FROM user");
    }

    public function test_signup_success(): void
    {
        $this->post('/api/auth/signup', [
            'username' => 'john_doe',
            'password' => 'john_'
        ])->assertStatus(201);
    }

    public function test_signup_failed_cause_username_already_exist(): void
    {
        $this->post('/api/auth/signup', [
            'username' => 'john_doe',
            'password' => 'john_'
        ])->assertStatus(201);

        $this->post('/api/auth/signup', [
            'username' => 'john_doe',
            'password' => 'john_'
        ])->assertStatus(400);
    }
}
