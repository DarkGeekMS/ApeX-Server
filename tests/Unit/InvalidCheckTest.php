<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class InvalidCheckTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();
        $response = $this->json(
            'POST',
            '/api/CheckCode',
            [
            'email' => $user["email"],
            'code' => 'bla bla bla'
            ]
        );
        $response->assertStatus(400);
        User::where('id', $user['id'])->forceDelete();

    }
}
