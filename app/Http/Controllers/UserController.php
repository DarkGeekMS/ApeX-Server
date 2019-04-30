<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Message;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Response;

/**
 * @group User
 *
 * Control the user interaction with other users
 */

class UserController extends Controller
{

    /**
     * Block a user
     * Validate the input by checking that the `blockedID` is valid and exists,
     * if he doesn't exist, return an error contains 'blocked user is not found'.
     * Also check the logged-in user is authenticated, and get the logged-in user id,
     * if he is not authenticated return an error contains 'Not authorized'.
     * if the user have already blocked the blocked user,
     * Unblock him by removing the record from the database.
     * Check that the user isn't blocking himself or return an error.
     * If the input is valid, then block the user.
     *
     * @param Request $request
     *
     * @return Response
     */
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
     * @response 400 {"error":"Not authorized"}
     * @response 404 {"error":"Blocked user is not found"}
     * @response 400 {"error":"The user can't block himself"}
     *
     * @bodyParam blockedID string required the id of the user to be blocked. Example: t2_1
     * @bodyParam token JWT required Used to verify the user. Example: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo
     */

    public function block(Request $request)
    {
        $validator = validator(
            $request->only('blockedID'),
            ['blockedID' => 'required|string']
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }
        $account = new AccountController();
        $meResponse = $account->me($request);

        $blockerID = $meResponse->getData()->user->id;

        $blockedID = $request->blockedID;

        if (!User::where('id', $blockedID)->exists()) {
            return response(['error' => 'Blocked user is not found'], 404);
        }

        if (Block::where(compact('blockerID', 'blockedID'))->exists()) {
            try {
                Block::where(compact('blockerID', 'blockedID'))->delete();
            } catch (\Exception $e) {
                return response(['error' => 'server-side error'], 500);
            }
            return response(['result' => 'The user has been unblocked successfully'], 200);
        }

        if ($blockedID === $blockerID) {
            return response()->json(['error' => "The user can't block himself"], 400);
        }

        try {
            Block::insert(compact('blockerID', 'blockedID'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'server-side error'], 500);
        }

        return response()->json(['result' => 'The user has been blocked successfully'], 200);
    }

    /**
     * Compose a message.
     * Validate the input by checking that the `receiver` is valid and exists,
     * and content and subject are valid strings or return an error.
     * Check the logged-in user is authenticated and get his id by requesting `me`.
     * Check that the given sender and receiver are not blocked from each other.
     * If all the input is valid, insert a new row in `messages` table
     * contains the message data, then return the id of the inserted message.
     *
     * @param Request $request
     *
     * @return Response
     */
    /**
     * Compose
     * Send a private message to another user.
     *
     * ###Success Cases :
     * 1. The parameters are valid, return the id of the composed message
     *    (status code 200)
     *
     * ###Failure Cases:
     * 1. Messaged-user id is not found (status code 404).
     * 2. Invalid token, return a message about the error (status code 400).
     * 3. The users are blocked from each other (status code 400)
     * 4. There is a server-side error (status code 500).
     *
     * @authenticated
     *
     * @response 200 {"id":"t4_1"}
     * @response 404 {"error":"Receiver id is not found"}
     * @response 400 {"error":["blocked users can't message each other"]}
     * @response 400 {"subject":["The subject field is required."]}
     * @response 400 {"reciever":["The receiver field is required."]}
     * @response 400 {"content":["The content field is required."]}
     * @response 400 {"error":"Not authorized"}
     *
     * @bodyParam receiver string required The username of the user to be messaged. Example: king
     * @bodyParam subject string required The subject of the message. Example: Hello
     * @bodyParam content text required the body of the message. Example: Can I have a date with you?
     * @bodyParam token JWT required Used to verify the user. Example: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo
     */

    public function compose(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'receiver' => 'required|string',
                'subject' => 'required|string',
                'content' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        if (!User::query()->where('username', $request->receiver)->exists()) {
            return response(['error' => 'Receiver username is not found'], 404);
        }
        //get receiver id
        $receiver = $request->receiver;
        $receiver = User::where('username', $receiver)->first()->id;

        $account = new AccountController();
        $meResponse = $account->me($request);

        $sender = $meResponse->getData()->user->id;

        //check that users are not blocked from each other
        if (Block::areBlocked($sender, $receiver)) {
            return response(["error" => "blocked users can't message each other"], 400);
        }

        $lastID = Message::selectRaw('CONVERT( SUBSTR(id, 4), INT ) AS intID')->get()->max('intID');
        $id = 't4_'.(string)($lastID + 1);

        $subject = $request->subject;
        $content = $request->content;

        try {
            Message::insert(compact('id', 'sender', 'receiver', 'subject', 'content'));
        } catch (\Exception $e) {
            response(['error' => 'server-side error'], 500);
        }

        return compact('id');
    }

    /**
     * Get user data
     * Validate the input by checking that the `username` is a valid and exists,
     * or return an error. If the input is valid return the user data and his posts.
     *
     * @param Request $request
     *
     * @return Response
     */
    /**
     * Guest Get User Data
     * Return user data to be seen by another user.
     * User data includes: username, fullname, karma,
     *  profile picture (URL) and personal posts
     *
     * Use this request only if the user is a guest and not authorized
     *
     * ###Success Cases :
     * 1.The parameters are valid, return the data of the user successfully
     *  (status code 200).
     *
     * ###Failure Cases:
     * 1. User is not found (status code 404).
     * 2. There is a server-side error (status code 500).
     *
     * @responseFile 200 responses\validGuestUserData.json
     * @responseFile 404 responses\userNotFound.json
     * @responseFile 400 responses\missingUsername.json
     *
     * @queryParam username required The username of an existing user. Example: King
     */

    public function guestUserData(Request $request)
    {
        $validator = validator(
            $request->only('username'),
            ['username' => 'required|string']
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $username = $request['username'];

        try {
            if (!User::where(compact('username'))->exists()) {
                return response()->json(['error' => 'User is not found'], 404);
            }

            $userData = User::where(compact('username'));

            $posts = Post::where('posted_by', $userData->first()['id'])->get();

            $userData = $userData->select('id', 'username', 'fullname', 'karma', 'avatar')->first();
        } catch (\Exception $e) {
            return response()->json(['error'=>'server-side error'], 500);
        }

        return compact('userData', 'posts');
    }

    /**
     * Call `guestUserData` if it failed return its response, else
     * check that the logged-in user is authorized and get his id or return error.
     * If the users are blocked from each other return an error message.
     * If the input is valid, filter the result using `filterResult` function from
     * `GeneralController` and return the filtered result.
     *
     * @param Request $request
     *
     * @return Response
     */
    /**
     * User Get User Data
     * Just like [Guest Get User Data](#guest-get-user-data), except that
     * it does't return user data between blocked users,
     * it also adds the current user vote on the user's posts
     * and if he had saved them.
     * Use this request only if the user is logged in and authorized.
     *
     * ###Success Cases :
     * 1. Return the data of the user successfully.
     *
     * ###Failure Cases:
     * 1. User is not found (status code 400).
     * 2. The `token` is invalid, return a message about the error (status code 400).
     * 3. The users are blocked from each other (status code 400)
     * 4. There is a server-side error (status code 500).
     *
     * @authenticated
     *
     * @responseFile 200 responses\validUserData.json
     * @responseFile 404 responses\userNotFound.json
     * @responseFile 400 responses\missingUsername.json
     * @responseFile 400 responses\blockedUserData.json
     *
     * @bodyParam username string required The username of an existing user. Example: King
     * @bodyParam token JWT required Used to verify the user. Example: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMzg0ODYyLCJuYmYiOjE1NTMzODQ4NjIsImp0aSI6Ikg0bU5yR1k0eGpHQkd4eXUiLCJzdWIiOiJ0Ml8yMSIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.OJU25mPYGRiPkBuZCrCxCleaRXLklvHMyMJWX9ijR9I
     */

    public function userData(Request $request)
    {
        $result = $this->guestUserData($request);
        if (!array_key_exists('posts', $result)) {
            return $result;
        }

        $account = new AccountController();
        $id1 = $account->me($request)->getData()->user->id;

        try {
            $id2 = User::where('username', $request['username'])->first()['id'];

            if (Block::areBlocked($id1, $id2)) {
                return response()->json(
                    ['error' => "blocked users can't view the data of each other"],
                    400
                );
            }
            //filter the posts
            $general = new GeneralController();
            $result = $general->filterResult(collect($result), $request['token']);
            return $result;
        } catch (\Exception $e) {
            return response()->json(['error'=>'server-side error'], 500);
        }
    }
}
