<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\ForgetPassword;
use JWTAuth;
use Tymon\JWTAuth\Http\Parser\Parser;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Support\CustomClaims;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;
use App\Models\User;
use App\Models\Code;

/**
 * @group Account
 *
 * Controls the authentication, info and messages of any user account.
 */

class AccountController extends Controller
{

    /**
     * SignUp
     * Registers new user into the website.
     * Success Cases :
     * 1) return user data and JWT token to ensure that the user created successfully.
     * failure Cases:
     * 1) username already exits.
     * 2) email already exists.
     *
     * @bodyParam email string required The email of the user.
     * @bodyParam username string required The choosen username.
     * @bodyParam password string required The choosen password.
     * @response{
     *  "user":{
     *   "email": "hello@gmail.com",
     *  "username": "MohamedRamzy1234",
     *   "id": "t2_13",
     *   "avatar": "storage/avatars/users/default.png",
     *   "updated_at": "2019-03-19 18:30:05",
     *   "created_at": "2019-03-19 18:30:05"
     *  },
     *  "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwv"
     * }
     * @response  400{
     * "email": [
     *  "The email has already been taken."
     * ],
     * "username": [
     *    "The username has already been taken."
     * ]
     * }
     * @response  400{
     * "email": [
     *  "The email has already been taken."
     * ]
     * }
     * @response  400{
     * "username": [
     *    "The username has already been taken."
     * ]
     * }
     */
    public function signUp(Request $request)
    {
        //validating the input data to be correct
        $validator = Validator::make(
            $request->all(),
            [
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'username' => 'required|string|max:50|unique:users',
            'avatar' => 'image'
            ]
        );

        $lastUser = DB::table('users')->orderBy('created_at', 'desc')->first();
        $id = "t2_1";
        if ($lastUser) {
            $count = DB::table('users') ->where('created_at', $lastUser->created_at)->count();
            $id = $lastUser->id;
            $newIdx = (int)explode("_", $id)[1];
            $id = "t2_".($newIdx+$count);
        }

        //Returning the validation errors in case of validation failure
        if ($validator->fails()) {
            //converting the errors to json and returning them with 400 status code
            return response()->json($validator->errors(), 400);
        }

        $requestData = $request->all();
        $requestData['id'] = $id;
        /*removing password_confirmation from the request data as we don't need it
        in the database
        */
        //unset($requestData["password_confirmation"]);

        $password = $requestData["password"];
        $requestData["password"] = Hash::make($password); // Hashing the password

        //creating new user with the posted data from the request
        $user = new User($requestData);
        $avatar = "storage/avatars/users/default.png"; //setting the default avatar
        $user->avatar = $avatar;
        $user->id = $id;
        $user->save(); //saving the user to the database

        $token = JWTAuth::fromUser($user); // Generating the user token

        //Returning the user data and the token with 200 status code
        return response()->json(compact('user', 'token'), 200);
    }

    /**
     * login
     * Validates user's credentials and logs him in.
     * Success Cases :
     * 1) return JWT token to ensure that the user loggedin successfully.
     * failure Cases:
     * 1) username is not found.
     * 2) invalid password.
     *
     * @bodyParam username string required The user's username.
     * @bodyParam password string required The user's password.
     * @response{
     * "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9X2luIiwiaWF0IjoxNTUzMD"
     * }
     * @response  400{
     * "error": "invalid_credentials"
     * }
     * @response  400{
     * "error": "could_not_create_token"
     * }
     */

    public function login(Request $request)
    {
        //Selecting username and password from the request data
        $credentials = $request->only('username', 'password');
        try {
            //Trying logging in with the given credentials
            if (!$token = JWTAuth::attempt($credentials)) {
                //Returning invalid credentials error with 400 status code
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            //Returning an error if the token cannot be created with 400 status code
            return response()->json(['error' => 'could_not_create_token'], 400);
        }
        //Returning the token
        return response()->json(compact('token'));
    }




    /**
     * mailVerify
     * Send a verification email to the user with a code in case of forgetting password.
     * Success Cases :
     * 1) return success or failure message to indicate whether the email is sent or not.
     * failure Cases:
     * 1) username is not found.
     *
     * @response{
     * "msg":"Email sent successfully"
     * }
     * @response  400 {
     * "msg":"Username is not found"
     * }
     * @response  400 {
     * "msg":"Error sending the email"
     * }
     * @bodyParam username string required The user's username.
     */

    public function mailVerify(Request $request)
    {
        //Validating the input parameters of the request
        $validator = Validator::make(
            $request->all(),
            [
            'username' => 'required|string'
            ]
        );

        //Returning the validation errors in case of validation failure
        if ($validator->fails()) {
            //converting the errors to json and returning them with 400 status code
            return response()->json($validator->errors(), 400);
        }
        //Getting the username from the request
        $username = $request->input("username");
        //Selecting the user from the database
        $user = User::where("username", $username)->first();
        if ($user) { // Checking if the user exists
            try {
                $codeText = Str::random(15); // Generating random code
                //Sending the email with random code
                \Mail::to($user)->send(new ForgetPassword($codeText));
            } catch (\Swift_TransportException $e) {
                /*Returning json response with status code 400
                 indicating an error in sending*/
                return response()->json(['msg' => 'Error sending the email'], 400);
            }
            Code::where('id', $user->id)->delete(); //Deleting previous codes
            $code = new Code; //creating new code
            $code->id = $user->id;
            $code->code = $codeText;
            $code->save(); //storing it into the database
            //Returning the success response with status 200
            return response()->json(['msg' => 'Email sent successfully'], 200);
        } else {
            //Return response with code 400 indicating that user is not found
            return response()->json(['msg' => 'Username is not found'], 400);
        }
    }




    /**
     * checkCode
     * Check whether the user entered the correct reset code sent to his email.
     * Success Cases :
     * 1) return success msg to indicate whether the code is valid or not
     * Failure Cases :
     * 1) Code is invalid.
     *
     * @response{
     * "authorized":true
     * }
     * @response  400{
     * "authorized":false
     * }
     * @bodyParam code int required The entered code.
     * @bodyParam username string required The user's username.
     */

    public function checkCode(Request $request)
    {
        //Validating the input parameters of the request
        $validator = Validator::make(
            $request->all(),
            [
            'username' => 'required|string',
            'code' => 'required|string'
            ]
        );

        //Returning the validation errors in case of validation failure
        if ($validator->fails()) {
            //converting the errors to json and returning them with 400 status code
            return response()->json($validator->errors(), 400);
        }

        $codeText = $request->input('code'); //Getting the code from request
        $username = $request->input('username'); // Getting the username
        $user = User::where('username', $username)->first(); //Getting user from DB
        //Checking if the user exists
        if ($user) {
            //selecting the corresponding code
            $code = Code::where('id', $user->id)
                ->where('code', $codeText)->first();
            if ($code) {
                //Returning the response indicating that the code is correct
                return response()->json(['authorized' => true], 200);
            } else {
                //Returning the response indicating that the code is not correct
                return response()->json(['authorized' => false], 400);
            }
        } else {
            //Returning the response indicating that the user is not found
            return response()->json(['authorized' => false], 400);
        }
    }




    /**
     * Logout
     * Logs out a user.
     * Success Cases :
     * 1) return token equals to null to ensure that the user is logout successfully.
     * failure Cases:
     * 1) Token invalid

     * @response{
     * "token":null
     * }
     * @response  400{
     * "token_error":"wrong number of segments"
     * }
     * @bodyParam token JWT required Used to verify the user.
     */

    public function logout(Request $request)
    {
        try {
            //Trying to parse the token given from the request
            $token = JWTAuth::parseToken();
            $token->invalidate(); // Blocking the token
        } catch (JWTException $e) {
            //Returning token error with 400 status code
            return response()->json(['token_error' => $e->getMessage()], 400);
        }
        //Returning the token with null value with 200 status code
        return response()->json(['token' => null], 200);
    }




    /**
     * deleteMsg
     * Delete private messages from the recipient's view of their inbox.
     * Success Cases :
     * 1) return true to ensure that the message is deleted successfully.
     * failure Cases:
     * 1) message id is not found.
     * 2) NoAccessRight token is not authorized.
     *
     * @bodyParam id string required The id of the message to be deleted.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function deleteMsg()
    {
        return;
    }



    /**
     * readMsg
     * Read a sent message.
     * Success Cases :
     * 1) return the details of the message.
     * 2) call moreChildren to retrieve replies to this message.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) message id not found.
     *
     * @bodyParam ID string required The id of the message.
     * @bodyParam token JWT required Used to verify the user recieving the message.
     */

    public function readMsg()
    {
        return;
    }





    /**
     * updates
     * Updates the preferences of the user.
     * Success Cases :
     * 1) return true to ensure that the data updated successfully.
     * 2) in case deactivating the account the account will be deleted.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) the changed email already exists.
     *
     * @bodyParam change_email string required Enable changing the email
     * @bodyParam change_password string required Enable changing the password.
     * @bodyParam deactivate_account string Enable deactivating the account.
     * @bodyParam media_autoplay bool Enabling media autoplay.
     * @bodyParam pm_notifications bool Enable pm notifications.
     * @bodyParam replies_notifications bool Enable notifications for replies.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function updates()
    {
        return;
    }




    /**
     * prefs
     * Returns the preferences of the user.
     * Success Cases :
     * 1) return the preferences of the logged-in user.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     */

    public function prefs()
    {
        return;
    }




    /**
     * Me
     * Returns the identity of the user logged in.
     * Success Cases :
     * 1) return the user object of the sent token as json.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @response{
     * "user": {
     *   "id": "t2_2",
     *   "fullname": null,
     *   "email": "111@gmail.com",
     *   "username": "MohamedRamzy123",
     *   "avatar": "storage/avatars/users/default.png",
     *   "karma": 1,
     *   "notification": 1,
     *   "type": 1,
     *   "created_at": "2019-03-18 09:36:09",
     *   "updated_at": "2019-03-18 09:36:09"
     *  }
     * }
     * @response  404{
     * "error" : "user_not_found"
     * }
     * @response  400{
     * "token_error":"The token has been blacklisted"
     * }
     * @bodyParam token JWT required Used to verify the user.
     */

    public function me(Request $request)
    {
        try {
            //Parsing the given token, trying to login and getting user data
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                /*Returning error if the token is a valid JWT but the encoded
                user doesn't exist with 404 status code*/
                return response()->json(['error' => 'user_not_found'], 404);
            }
        } catch (JWTException $e) {
            //Returning token error with the error message if any error occured
            return response()->json(['token_error' => $e->getMessage()], 400);
        }
        //Returning the data of the user with 200 status code
        return response()->json(compact('user'));
    }




    /**
     * profileInfo
     * Displaying the profile info of the user.
     * Success Cases :
     * 1) return username, profile picture , karma count , lists of the saved , personal and hidden posts of the user.
     * 2) in case of moderator it will also return the reports of the ApexCom he is moderator in.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     */

    public function profileInfo()
    {
        return;
    }




    /**
     * karma
     * Returns the karma of the user.
     * Success Cases :
     * 1) return the karmas of the user.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     */

    public function karma()
    {
        return;
    }




    /**
     * messages
     * Returns the inbox messages of the user.
     * Success Cases :
     * 1) return lists of the inbox messages of the user categorized by All , Sent and Unread.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam max int the maximum number of messages to be returned.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function inbox()
    {
        return;
    }
}
