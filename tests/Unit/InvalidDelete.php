<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use DB;

class InvalidDelete extends TestCase
{
    /**
     *
     * @test
     *
     * @return void
     */
    //no post
    public function noPost()
    {
        $admin = factory(User::class)->create();
        User::where('id', $admin['id'])->update(['type' => 3]);

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $admin['username'],
              'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);
        $token = $signIn->json('token');
        $response = $this->json(
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => 't3_06'
            ]
        );
        $response->assertStatus(404);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        DB::table('users')->where('id', $admin['id'])->delete();
    }


    /**
     *
     * @test
     *
     * @return void
     */
    //no comment or reply
    public function noComment()
    {
        $admin = factory(User::class)->create();
        User::where('id', $admin['id'])->update(['type' => 3]);

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $admin['username'],
              'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);
        $token = $signIn->json('token');
        $response = $this->json(
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => 't1_01'
            ]
        );
        $response->assertStatus(404);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        DB::table('users')->where('id', $admin['id'])->delete();
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //not valid user
    public function noUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'Anyone',
            'password' => '451447'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => 't3_5'
            ]
        );
        $response->assertStatus(400);
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //not post owner , admin or moderator in the apexcom where the post in
    public function notAllowed()
    {
        $admin = factory(User::class)->create();

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $admin['username'],
            'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);
        $token = $signIn->json('token');
        $response = $this->json(
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => 't3_6'
            ]
        );
        $response->assertStatus(400);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        DB::table('users')->where('id', $admin['id'])->delete();
    }
}
