<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Session::start();

        $this->post('/api/auth/signup', [
            'username' => 'john_doe',
            'password' => 'john_'
        ])->assertStatus(201);
    }

    public function tearDown(): void
    {
        DB::delete("DELETE FROM user");
    }

    public function test_login_success(): void
    {
        $this->post('/api/auth/login', [
            'username' => 'john_doe',
            'password' => 'john_'
        ])->assertStatus(200);
    }

    public function test_login_failed(): void
    {
        $this->post('/api/auth/login', [
            'username' => 'john_joe',
            'password' => 'john_'
        ])->assertStatus(401);
    }
}
