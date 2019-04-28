<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use app\Models\Code;
use app\Models\User;

class ValidCheck extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $username =  'MohamedRamzy';
        $response = $this->json(
            'POST',
            '/api/MailVerification',
            [
            'username' => $username,
            ]
        );
        $id = User::where('username', $username)->first()->id;
        $code = Code::where('id', $id)->first()->code;
        $response = $this->json(
            'POST',
            '/api/MailVerification',
            [
            'username' => 'MohamedRamzy',
            'code' => $code
            ]
        );
        $response->assertStatus(200);
    }
}
