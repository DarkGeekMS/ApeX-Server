<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\block;

/**
 * @group User
 *
 * Control the user interaction with other users
 */

class User extends Controller
{


    /**
     * block
     * Block a user, so he can't send private messages or see the blocked user posts or comments.
     * Success Cases :
     * 1) return status code 200 and json contains 'the user has been blocked successfully'.
     * failure Cases:
     * 1) No Access Right token is not authorized.
     * 2) Blocked user id is not found (status code 404)
     * 3) The user is already blocked for the current user (status code 400).
     * 4) The user is blocking himself
     *
     * @bodyParam blockedID string required the id of the user to be blocked.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function block(Request $request)
    {
        $account = new Account();
        $meResponse = $account->me($request);
        if (!array_key_exists('user', $meResponse->getData())) {
            //there is token_error or user_not found_error
            return $meResponse;
        }
        $blockerID = $meResponse->getData()->user->id;

        $validator = validator(
            $request->only('blockedID'),
            ['blockedID' => 'required|string']
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }
        $blockedID = $request->blockedID;
        \App\User::findOrFail($blockedID);  //raises an error if user is not found

        if (block::where(compact('blockerID', 'blockedID'))->exists()) {
            return response()->json(['error' => 'The user is already blocked for the current user'], 400);
        }

        if ($blockedID === $blockerID) {
            return response()->json(['error' => "The user can't block himself"], 400);
        }

        try {
            block::insert(compact('blockerID', 'blockedID'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'server-side error'], 500);
        }

        return response()->json(['result' => 'The user has been blocked successfully'], 200);
    }

    /**
     * compose
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
     * userDataByAccountID
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
