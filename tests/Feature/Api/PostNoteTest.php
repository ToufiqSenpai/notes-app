<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostNoteTest extends TestCase
{
    private string $token;

    private User $user;

    public function setUp(): void
    {
        $this->user = User::factory()->create();
        $this->token = JWTAuth::fromUser($this->user);
    }

    public function tearDown(): void
    {
        $this->user->delete();
    }

    public function test_create_note_success(): void
    {
        $this->post('/api/notes', [
            'title' => 'Food Recipe',
            'content' => 'Nasi cumi pak kris',
            'color' => 'SALMON'
        ], ['Authorization' => 'Bearer ' . $this->token])->assertStatus(201)->assertJson([
            'title' => 'Food Recipe',
            'content' => 'Nasi cumi pak kris',
            'color' => 'SALMON'
        ]);
    }
}