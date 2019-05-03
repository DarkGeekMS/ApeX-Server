<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Models\ApexCom;
use App\Models\Moderator;
use App\Models\User;
use App\Models\Post;
use App\Models\ReportPost;
use App\Models\ReportComment;
use App\Models\Comment;
use DB;

class ReviewReportsTest extends TestCase
{

    use WithFaker;
    
    /**
     * Test with an Apexcom not found, or with out a token.
     *
     * @test
     *
     * @return void
     */
    public function apexComNotFound()
    {
        // hit the route with out token
        $response = $this->json(
            'POST',
            '/api/ReviewReports',
            [
            ]
        );
        // a token error will apear.
        $response->assertStatus(400)->assertSee('Not authorized');

        $user = factory(User::class)->create();

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $user['username'],
              'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);

        $token = $signIn->json('token');

        // hit the route with an invalid id of an apexcom to review reports.
        $response = $this->json(
            'POST',
            '/api/ReviewReports',
            [
                'token' => $token,
                'ApexCom_id' => '12354'
            ]
        );
        // an error that the apexcom is not found
        $response->assertStatus(404)->assertSee('ApexCom is not found.');

        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }

    /**
     * This test function tests moderation restrictions.
     *
     * @test
     *
     * @return void
     */
    public function moderationRestrictions()
    {

        $user = factory(User::class)->create();

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $user['username'],
              'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);

        $token = $signIn->json('token');

        // set the moderator as a normal user.
        User::where('id', $user['id'])->update(['type' => 1]);

        $apex_id = ApexCom::all()->first()->id;

        // hit the route with a user that is not a moderator or site admin
        $response = $this->json(
            'POST',
            '/api/ReviewReports',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id
            ]
        );

        // an error that you are not a moderator to this apexcom
        $response->assertStatus(400)->assertSee('You are not a moderator of this apexcom.');
        
        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the users deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
    /**
     * User reviews reports.
     *
     * @test
     *
     * @return void
     */
    public function userSucceeds()
    {
        $user = factory(User::class)->create();

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $user['username'],
              'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);

        $token = $signIn->json('token');

        // set the moderator as a site admin.
        User::where('id', $user['id'])->update(['type' => 3]);

        $apex_id = ApexCom::all()->first()->id;

        // hit the route with a site admin
        $response = $this->json(
            'POST',
            '/api/ReviewReports',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id
            ]
        );

        // reports are returned
        $response->assertStatus(200);
        
        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the users deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
