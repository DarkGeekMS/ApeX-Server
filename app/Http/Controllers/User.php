<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group User
 *
 * Control the user interaction with other users
 */

class User extends Controller
{

    /**
     * Block.
     * Block a user, so he can't send private messages or see the blocked user posts or comments.
     * Success Cases :
     * 1) return true to ensure that the user is blocked successfully.
     * failure Cases:
     * 1) blockeduser id is not found or already blocked for the current user.
     * 2) NoAccessRight token is not authorized.
     *
     * @bodyParam id string required the id of the user to be blocked.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function block()
    {
        return;
    }



    /**
     * Compose.
     * Send a private message to another user.
     * Success Cases :
     * 1) return true to ensure that the message sent successfully.
     * failure Cases:
     * 1) messaged-user id is not found.
     * 2) NoAccessRight token is not authorized.
     *
     * @bodyParam to string required The id of the user to be messaged.
     * @bodyParam subject string required The subject of the message.
     * @bodyParam mes text the body of the message.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function compose()
    {
        return;
    }



    /**
     * UserDataByAccountID.
     * Return user public data to be seen by another user.
     * Success Cases :
     * 1) return the data of the user successfully.
     * failure Cases:
     * 1) username is not found.
     * 2) NoAccessRight token is not authorized.
     *
     * @bodyParam id string required The id of an existing user.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function userDataByAccountID()
    {
        return;
    }
}
