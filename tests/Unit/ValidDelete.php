<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class ValidDelete extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */

     //post owner ( post owner can delete any comment on his post).
     //login to get a token for a post owner and call delete function to delete a comment on this post.
     //response status = 200 comment deleted successfully.
    public function postOwnerC()
    {
         $loginResponse = $this->json(
             'POST',
             '/api/SignIn',
             [
             'username' => 'mX',
             'password' => 'killa$&12'
             ]
         );
         $token = $loginResponse->json('token');
         $response = $this->json(
             'DELETE',
             '/api/Delete',
             [
             'token' => $token,
             'name' => 't1_1'
             ]
         );
         $response->assertStatus(200);
         $this->assertDatabaseMissing('comments', ['id' => 't1_1']);
         $logoutResponse = $this->json(
             'POST',
             '/api/SignOut',
             [
             'token' => $token
             ]
         );
    }

    /**
     *
     * @test
     *
     * @return void
     */
     //post owner
     //login to get a token for a post owner and call delete function to delete the post
     //response status = 200 post deleted successfully.
    public function postOwner()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'mX',
            'password' => 'killa$&12'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => 't3_1'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts', ['id' => 't3_1']);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //comment owner
    //login to get a token for a comment owner and call delete function to delete the comment
    //response status = 200 comment deleted successfully.
    public function commentOwner()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'Anyone',
            'password' => 'anyone'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => 't1_2'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments', ['id' => 't1_2']);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //admin in the website delete post
    public function adminPost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => 't3_2'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts', ['id' => 't3_2']);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //admin in the website delete post
    public function adminComment()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => 't1_3'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments', ['id' => 't1_3']);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //moderator in the apexcom where the post or comment to be deleted
    public function moderatorComment()
    {

        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => 't1_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments', ['id' => 't1_4']);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //moderator in the apexcom where the post or comment to be deleted
    public function moderatorPost()
    {

        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => 't3_3'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts', ['id' => 't3_3']);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //moderator in the apexcom where the post or comment to be deleted
    public function records()
    {

        DB::table('posts')->insert([
        'id' => 't3_1',
        'posted_by' => 't2_2',
        'apex_id' => 't5_1',
        'title' => 'Anything',
        'created_at' => '2019-03-23 17:20:30'
        ]);

        DB::table('posts')->insert([
        'id' => 't3_2',
        'posted_by' => 't2_1',
        'apex_id' => 't5_1',
        'title' => 'Anything',
        'created_at' => '2019-03-23 17:20:31'
        ]);

        DB::table('posts')->insert([
        'id' => 't3_3',
        'posted_by' => 't2_4',
        'apex_id' => 't5_1',
        'title' => 'Anything',
        'created_at' => '2019-03-23 17:20:32'
        ]);
          DB::table('comments')->insert([
          'id' => 't1_1',
          'commented_by' => 't2_1',
          'content' => 'Hey there',
          'root' => 't3_1',
          'created_at' => '2019-03-23 17:20:37'
          ]);

          DB::table('comments')->insert([
          'id' => 't1_2',
          'commented_by' => 't2_3',
          'content' => 'hii there',
          'root' => 't3_2',
          'created_at' => '2019-03-23 17:20:38'
          ]);

          DB::table('comments')->insert([
          'id' => 't1_3',
          'commented_by' => 't2_2',
          'content' => 'good bye there',
          'root' => 't3_3',
          'created_at' => '2019-03-23 17:20:39'
          ]);

        DB::table('comments')->insert([
          'id' => 't1_4',
          'commented_by' => 't2_2',
          'content' => 'good morning there',
          'root' => 't3_4',
          'created_at' => '2019-03-23 17:20:40'
        ]);

        $this->assertTrue(true);
    }
}
