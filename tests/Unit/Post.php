<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Models\ApexCom;
use App\Models\ApexBlock;
use App\Models\Post;
use \App\Models\User;

class Post extends TestCase
{


    use WithFaker;

    /**
     * Test with an Apexcom not found, and with out token.
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
            '/api/SubmitPost',
            [
            ]
        );
        // a token error will apear.
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
        // hit the route with an invalid id of an apexcom to submit a post in it
        $response = $this->json(
            'POST',
            '/api/SubmitPost',
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
     * User Blocked from apexcom.
     *
     * @test
     *
     * @return void
     */
    public function userBlockedFromApexcom()
    {
        //fake a user, sign him up and get the token
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

        // get any apexcom and block the signed in user from
        $apex_id = ApexCom::all()->first()->id;
        ApexBlock::create(
            [
                'blockedID' => $user['id'],
                'ApexID' => $apex_id
            ]
        );
        $blockedID = $user['id'];
        $ApexID = $apex_id;
        //check that the blocked user from apexcom is added to database
        $this->assertDatabaseHas('apex_blocks', compact('blockedID', 'ApexID'));

        // hit the route with the blocked user
        $response = $this->json(
            'POST',
            '/api/SubmitPost',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id
            ]
        );

        // an error that the user is blocked from the apexcom
        $response->assertStatus(400)->assertSee('You are blocked from this Apexcom');

        // delete user added to database and blocked from apexblock table

        ApexBlock::where('blockedID', $user['id'])->delete();
        User::where('id', $user['id'])->forceDelete();

        //check that the blocked user from apexcom is deleted from database
        $this->assertDatabaseMissing('apex_blocks', compact('blockedID', 'ApexID'));

        // check that the user added in test function is deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
    /**
     * An user is posting in an apexcom with invalid or insufficient data of post.
     *
     * @test
     *
     * @return void
     */
    public function invalidData()
    {
        //fake a user, sign him up and get the token
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

        // get the first apexcom and post in it with the signed in user with the synthesized parameters.
        $apex_id = ApexCom::all()->first()->id;
        $posted_by = $user['id'];
        $body = "body";
        $title = "title";
        $img_name = "image.png";
        $video_url="https://stackoverflow.com/questions/24794601/laravel-assets-url";

        // hit the route with non complete information several times it shouldn't create a post
        $response = $this->json(
            'POST',
            '/api/SubmitPost',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id,
                'body' => $body
            ]
        );

        // an error that the title parameter is required.
        $response->assertStatus(400);

        //check that there is no post added to database
        $this->assertDatabaseMissing('posts', compact('apex_id', 'posted_by'));


        $response = $this->json(
            'POST',
            '/api/SubmitPost',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id,
                'title' => $title
            ]
        );

        // an error that the post should contain at least body or video or image.
        $response->assertStatus(400);

        //check that there is no post added to database
        $this->assertDatabaseMissing('posts', compact('apex_id', 'posted_by'));

        $response = $this->json(
            'POST',
            '/api/SubmitPost',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id,
                'title' => $title,
                'img_name' => $img_name
            ]
        );

        // an error that the img_name should be an image type.
        $response->assertStatus(400);

        //check that there is no post added to database
        $this->assertDatabaseMissing('posts', compact('apex_id', 'posted_by'));

        $response = $this->json(
            'POST',
            '/api/SubmitPost',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id,
                'title' => $title,
                'video_url' => $video_url
            ]
        );

        // an error that the url should be a youtube video.
        $response->assertStatus(400);

        //check that there is no post added to database
        $this->assertDatabaseMissing('posts', compact('apex_id', 'posted_by'));

        // delete user added to database

        User::where('id', $user['id'])->forceDelete();

        // check that the user added in test function is deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
    /**
     * User posts a valid post in an apexcom.
     *
     * @test
     *
     * @return void
     */
    public function userSucceeds()
    {
        //fake a user, sign him up and get the token
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

        // get the first apexcom and post in it with the signed in user with the synthesized parameters.
        $apex_id = ApexCom::all()->first()->id;
        $posted_by = $user['id'];
        $body = "body";
        $title = "title";

        // hit the endpoint with valid parameters
        $response = $this->json(
            'POST',
            '/api/SubmitPost',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id,
                'title' => $title,
                'body' => $body
            ]
        );

        // the post should be created in the apexcom.
        $response->assertStatus(200);

        //check that there is no post added to database
        $this->assertDatabaseHas('posts', compact('apex_id', 'posted_by'));

        // delete user and post added to database
        Post::where([['posted_by', $posted_by], ['apex_id', $apex_id]])->delete();
        User::where('id', $user['id'])->forceDelete();
        //check that the added user and post are deleted from database
        $this->assertDatabaseMissing('posts', compact('apex_id', 'posted_by'));
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
