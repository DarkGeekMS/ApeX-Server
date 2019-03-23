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
     * Block
     * User block another user, so they can't send private messages to each other
     *  or see their each other posts or comments.
     * If the user is already blocked, the request will unblock him
     * 
     * ###Success Cases :
     * 1. Return json contains 'the user has been blocked successfully',
     *        if the user was not blocked (status code 200)
     * 2. Return json contains 'the user has been unblocked seccessfully',
     *        if the user was blocked already (status code 200).
     * 
     * ###Failure Cases:
     * 1. The `token` is invalid, return a message about the error (stauts code 400).
     * 2. Blocked user is not found (status code 404)
     * 3. The user is blocking himself (status code 400)
     *
     * @authenticated
     * 
     * @response 200 {"result":"The user has been blocked successfully"}
     * @response 200 {"result":"The user has been unblocked successfully"}
     * @response 400 {"token":["The token field is required."]}
     * @response 400 {"token_error":"Wrong number of segments"}
     * @response 400 {"token_error":"Token Signature could not be verified."}
     * @response 404 {"error":"Blocked user is not found"}
     * @response 400 {"error":"The user can't block himself"}
     * 
     * @bodyParam blockedID string required the id of the user to be blocked. Example: t2_1
     * @bodyParam token JWT required Used to verify the user. Example: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo
     */

    public function block(Request $request)
    {
        $validator = validator(
            $request->only('blockedID', 'token'),
            ['blockedID' => 'required|string', 'token' => 'required']
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }
        $account = new Account();
        $meResponse = $account->me($request);
        if (!array_key_exists('user', $meResponse->getData())) {
            //there is token_error or user_not found_error
            return $meResponse;
        }
        $blockerID = $meResponse->getData()->user->id;

        $blockedID = $request->blockedID;
        if (!\App\User::where('id', $blockedID)->exists()) {
            return response(['error' => 'Blocked user is not found'], 404);
        }

        if (block::where(compact('blockerID', 'blockedID'))->exists()) {
            try {
                block::where(compact('blockerID', 'blockedID'))->delete();
            } catch (\Exception $e) {
                return response(['error' => 'server-side error'], 500);
            }
            return response(['result' => 'The user has been unblocked successfully'], 200);
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
