<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ApexCom;
use \App\Models\User;

class SiteAdmin extends TestCase
{


    use WithFaker;
    /**
     * Test with a normal user that can not edit or create an apexcom or without sending a token.
     *
     * @test
     *
     * @return void
     */
    public function noAccessRightsforNormalUsers()
    {

        // hit the route with out token
        $response = $this->json(
            'POST',
            '/api/SiteAdmin',
            [
            ]
        );
        // a token error will apear.
        $response->assertStatus(400)->assertSee('Not authorized');

        //fake a user, sign him up and get the token
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 1]);

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

        // hit the route with a normal user
        $name = 'mondas';
        $response = $this->json(
            'POST',
            '/api/SiteAdmin',
            [
                'token' => $token,
                'name' => $name,
                'description' => 'concerning about sports',
                'rules' => 'you can do anything you want'
            ]
        );

        // an error that the normal user has no access to create or edit an apexcom
        $response->assertStatus(400)->assertSee('No Access Rights to create or edit an ApexCom');

        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);

        //check that there is no apexcom added to database
        $this->assertDatabaseMissing('apex_coms', compact('name'));
    }
    /**
     * An admin is creating an apexcom with invalid or insufficient information.
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

        //changing normal user to admin.
        User::where('id', $user['id'])->update(['type' => 3]);

        // hit the route with the admin with non complete information several times
        $name = 'mondas';
        $response = $this->json(
            'POST',
            '/api/SiteAdmin',
            [
                'token' => $token,
                'name' => $name,
                'rules' => 'you can post or comment'
            ]
        );

        // an error that the description parameter is required.
        $response->assertStatus(400);

        //check that there is no apexcom added to database
        $this->assertDatabaseMissing('apex_coms', compact('name'));


        $response = $this->json(
            'POST',
            '/api/SiteAdmin',
            [
                'token' => $token,
                'name' => $name,
                'rules' => 'you can post',
                'avatar' => 'sports.php'
                ]
        );

        // an error that the avatar parameter should be image type.

        $response->assertStatus(400);

        //check that there is no apexcom added to database
        $this->assertDatabaseMissing('apex_coms', compact('name'));

        $name = 'sp';
        $response = $this->json(
            'POST',
            '/api/SiteAdmin',
            [
                'token' => $token,
                'name' => $name,
                'description' => 'concerning about different sports',
                'rules' => 'you can post'
            ]
        );

        // an error that the name should be at least 3 characters.
        $response->assertStatus(400);

        //check that there is no apexcom added to database
        $this->assertDatabaseMissing('apex_coms', compact('name'));

        // delete user added to database

        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
    /**
     * Admin succeeds to edit or create an apexcom.
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
        //changing normal user to admin.

        User::where('id', $user['id'])->update(['type' => 3]);

        // hit the route with the admin with complete information
        $name = 'kareemOsama';
        $response = $this->json(
            'POST',
            '/api/SiteAdmin',
            [
                'token' => $token,
                'name' => $name,
                'description' => 'concerning about multiple sports',
                'rules' => 'you can post or have fun :D'
            ]
        );

        // an apexcom with name sports should be created.
        $response->assertStatus(200);

        //check that there is an apexcom added to database
        $this->assertDatabaseHas('apex_coms', compact('name'));

        // edit the rules of the apexcom
        $rules = 'you can not post';
        $response = $this->json(
            'POST',
            '/api/SiteAdmin',
            [
                'token' => $token,
                'name' => $name,
                'description' => 'concerning about multiple sports',
                'rules' => $rules
            ]
        );

        // an apexcom with name sports should be created.
        $response->assertStatus(200);

        //check that there is an apexcom added to database
        $this->assertDatabaseHas('apex_coms', compact('name', 'rules'));

        // delete user and apexcoms added to database
        User::where('id', $user['id'])->forceDelete();
        apexCom::where('name', $name)->delete();

        //check that the added user and apexcom are deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
        $this->assertDatabaseMissing('apex_coms', compact('name'));
    }
}
