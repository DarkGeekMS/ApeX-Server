<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\block;
use App\message;

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
     * 4. There is a server-side error (status code 500).
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
     * Compose
     * Send a private message to another user.
     * 
     * ###Success Cases :
     * 1. The parameters are valid, return the id of the composed message 
     *    (status code 200)
     * 
     * Failure Cases:
     * 1. Messaged-user id is not found (status code 404).
     * 2. Invalid token, return a message about the error (status code 400).
     * 3. The users are blocked from each other (status code 400)
     * 2. There is a server-side error (status code 500).
     * 
     * @authenticated
     * 
     * @response 200 {"id":"t4_1"}
     * @response 404 {"error":"Receiver id is not found"}
     * @response 400 {"error":["blocked users can't message each other"]}
     * @response 400 {"subject":["The subject field is required."]}
     * @response 400 {"reciever":["The receiver field is required."]}
     * @response 400 {"content":["The content field is required."]}
     * @response 400 {"token":["The token field is required."]}
     * @response 400 {"token_error":"Wrong number of segments"}
     * @response 400 {"token_error":"Token Signature could not be verified."}
     * 
     * @bodyParam receiver string required The id of the user to be messaged. Example: t2_1
     * @bodyParam subject string required The subject of the message. Example: Hello
     * @bodyParam content text required the body of the message. Example: Can I have a date with you?
     * @bodyParam token JWT required Used to verify the user. Example: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo
     */

    public function compose(Request $request)
    {
        $validator = validator(
            $request->all(), [
                'receiver' => 'required|string',
                'subject' => 'required|string',
                'content' => 'required',
                'token' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        if (!\App\User::query()->where('id', $request->receiver)->exists()) {
            return response(['error' => 'Receiver id is not found'], 404);
        }
        $receiver = $request->receiver;

        $account = new Account();
        $meResponse = $account->me($request);
        if (!array_key_exists('user', $meResponse->getData())) {
            return $meResponse;  //The token is invalid
        }
        $sender = $meResponse->getData()->user->id;

        //check that users are not blocked from each other
        if (block::query()->where(
            ['blockerID' => $sender, 'blockedID' => $receiver]
        )->orWhere(
            ['blockerID' => $receiver, 'blockedID' => $sender]
        )->exists()
        ) {
            return response(["error" => "blocked users can't message each other"], 400);
        }

        $lastID = message::selectRaw('CONVERT( SUBSTR(id, 4), INT ) AS intID')->get()->max('intID');
        $id = 't4_'.(string)($lastID + 1);

        $subject = $request->subject;
        $content = $request->content;

        try {
            message::insert(compact('id', 'sender', 'receiver', 'subject', 'content'));
        } catch (\Exception $e) {
            response(['error' => 'server-side error'], 500);
        }

        return compact('id');
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
