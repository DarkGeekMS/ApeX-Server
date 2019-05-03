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

class IgnoreReportTest extends TestCase
{

    use WithFaker;
    /**
     * Test with an Apexcom not found, or with out a token, or without user to ignore a report.
     *
     * @test
     *
     * @return void
     */
    public function nonCompleteParameters()
    {
        // hit the route with out token
        $response = $this->json(
            'POST',
            '/api/IgnoreReport',
            [
            ]
        );

        // a token error will apear.
        $response->assertStatus(400)->assertSee('Not authorized');

        //create the moderator and the blocked user and sign in with the moderator.
        $reporteruser = factory(User::class)->create();

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

        // hit the route with an invalid id of an apexcom.
        $response = $this->json(
            'POST',
            '/api/IgnoreReport',
            [
                'token' => $token,
                'user_id' => $reporteruser['id']
            ]
        );
        // an error that the apexcom is not found
        $response->assertStatus(404)->assertSee('Unable to find a post or a comment.');

        $reported_id = Post::all()->first()->id;

        // hit the route with out a user to be blocked
        $response = $this->json(
            'POST',
            '/api/IgnoreReport',
            [
                'token' => $token,
                'report_id' => $reported_id
            ]
        );
        // an error that the apexcom is not found
        $response->assertStatus(404)->assertSee('User not found.');
        

        // delete users added to database
        User::where('id', $user['id'])->forceDelete();
        User::where('id', $reporteruser['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
        $this->assertDatabaseMissing('users', ['id' => $reporteruser['id']]);
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
        //create the moderator and the blocked user and sign in with the moderator.
        $reporteruser = factory(User::class)->create();

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

        // get any post
        $reported_id = Post::all()->first()->id;

        // set the moderator as a normal user.
        User::where('id', $user['id'])->update(['type' => 1]);

        // hit the route with a user that is not a moderator or site admin
        $response = $this->json(
            'POST',
            '/api/IgnoreReport',
            [
                'token' => $token,
                'report_id' => $reported_id,
                'user_id' => $reporteruser['id']
            ]
        );

        // an error that you are not a moderator to this apexcom
        $response->assertStatus(400)->assertSee('You have no rights to edit posts or comments in this apexcom.');
        
        // get any comment
        $reported_id = Comment::all()->first()->id;

        // hit the route with a user that is not a moderator or site admin
        $response = $this->json(
            'POST',
            '/api/IgnoreReport',
            [
                'token' => $token,
                'report_id' => $reported_id,
                'user_id' => $reporteruser['id']
            ]
        );

        // an error that you are not a moderator to this apexcom
        $response->assertStatus(400)->assertSee('You have no rights to edit posts or comments in this apexcom.');

        // delete user added to database and reporter user
        User::where('id', $user['id'])->forceDelete();
        User::where('id', $reporteruser['id'])->forceDelete();

        //check that the users deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
        $this->assertDatabaseMissing('users', ['id' => $reporteruser['id']]);
    }

    /**
     * This test function tests the succeeded block and unblock process.
     *
     * @test
     *
     * @return void
     */
    public function userSucceeds()
    {
        //create the moderator and the blocked user and sign in with the moderator.
        $reporteruser = factory(User::class)->create();

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

        // get an apexcom
        $apex_id = ApexCom::all()->first()->id;

        // make the signed in user moderator in apexcom
        $makemoderator = factory(Moderator::class)->create(['userID' => $user['id'], 'apexID' => $apex_id]);
        $this->assertDatabaseHas('moderators', ['userID' => $user['id'], 'apexID' => $apex_id]);

        // create post in this apexcom.
        $post = factory(Post::class)->create(['apex_id' => $apex_id]);

        // create comment on the post
        $comment = factory(Comment::class)->create(['root' => $post['id']]);

        // hit the route with a loged in moderator to ignore the post and comments
        $response = $this->json(
            'POST',
            '/api/IgnoreReport',
            [
                'token' => $token,
                'report_id' => $post['id'],
                'user_id' => $reporteruser['id']
            ]
        );
        
        $response->assertStatus(404)->assertSee('Report not found.');

        $response = $this->json(
            'POST',
            '/api/IgnoreReport',
            [
                'token' => $token,
                'report_id' => $comment['id'],
                'user_id' => $reporteruser['id']
            ]
        );
        
        $response->assertStatus(404)->assertSee('Report not found.');

        // create report on post in this apexcom.
        $reportpost = factory(ReportPost::class)->create(['postID' => $post['id'], 'userID' => $reporteruser['id'] ]);

        // create report on comment on the post in the apexcom.
        $reportcomment = factory(ReportComment::class)->create(['comID' => $comment['id'], 'userID' => $reporteruser['id'] ]);

        // check that the reports on post and comment are added to data base.
        $this->assertDatabaseHas('report_comments', ['userID' => $reporteruser['id'], 'comID' => $comment['id']]);
        $this->assertDatabaseHas('report_posts', ['userID' => $reporteruser['id'], 'postID' => $post['id']]);

        // hit the route with a loged in moderator to ignore the post and comments
        $response = $this->json(
            'POST',
            '/api/IgnoreReport',
            [
                'token' => $token,
                'report_id' => $post['id'],
                'user_id' => $reporteruser['id']
            ]
        );
        
        $response->assertStatus(200)->assertSee('Ignore report on post');
        
        // hit the route with a loged in moderator to ignore the post and comments
        $response = $this->json(
            'POST',
            '/api/IgnoreReport',
            [
                'token' => $token,
                'report_id' => $comment['id'],
                'user_id' => $reporteruser['id']
            ]
        );

        $response->assertStatus(200)->assertSee('Ignore report on comment');

        // check that the reports on post and comment are deleted.
        $this->assertDatabaseMissing('report_comments', ['userID' => $reporteruser['id'], 'comID' => $comment['id']]);
        $this->assertDatabaseMissing('report_posts', ['userID' => $reporteruser['id'], 'postID' => $post['id']]);

        // delete post and comment and moderator
        Post::where('id', $post['id'])->forceDelete();
        Comment::where('id', $comment['id'])->forceDelete();
        Moderator::where([['apexID', $apex_id], ['userID', $user['id']]])->forceDelete();

        // check that moderator is deleted
        $this->assertDatabaseMissing('moderators', ['userID' => $user['id'], 'apexID' => $apex_id]);


        
        // delete user added to database and reporter user
        User::where('id', $user['id'])->forceDelete();
        User::where('id', $reporteruser['id'])->forceDelete();

        //check that the users deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
        $this->assertDatabaseMissing('users', ['id' => $reporteruser['id']]);
    }
}
