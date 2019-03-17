<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Http\Parser\Parser;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Support\CustomClaims;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;

/**
 * @group Account
 *
 * Controls the authentication, info and messages of any user account.
 */

class Account extends Controller
{

    /**
     * SignUp
     * Registers new user into the website.
     * Success Cases :
     * 1) return true to ensure that the user created successfully.
     * failure Cases:
     * 1) verify_password is not the same as the password.
     * 2) username and email are the same.
     * 3) username already exits.
     * 4) email already exists.
     *
     * @bodyParam email string required The email of the user.
     * @bodyParam username string required The choosen username.
     * @bodyParam password string required The choosen password.
     * @bodyParam verify_password required string The repeated value of the password.
     * @bodyParam userImage string required The name of the image for the user.
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
        //selecting the last user inserted to generate the new user id
        $lastUser = DB::table('users')->orderBy('created_at', 'desc')->first();
        $id = "t2_1"; // Default id if there aren't any existing users
        if ($lastUser) {
            $id = $lastUser->id;
            $newIdx = (int)explode("_", $id)[1]; // Getting the id number
            $id = "t2_".($newIdx+1); //constructing the new id with t2_i format
        }
        //Returning the validation errors in case of validation failure
        if ($validator->fails()) {
            //converting the errors to json and returning them with 400 status code
            return response()->json($validator->errors()->toJson(), 400);
        }

        $requestData = $request->all();
        $requestData['id'] = $id;
        /*removing password_confirmation from the request data as we don't need it
        in the database
        */
        unset($requestData["password_confirmation"]);

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
     * 1) return true to ensure that the user loggedin successfully.
     * failure Cases:
     * 1) username is not found.
     * 2) invalid password.
     *
     * @bodyParam username string required The user's username.
     * @bodyParam password string required The user's password.
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
            //Returning an error if the token cannot be created with 500 status code
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
          //Returning the token
        return response()->json(compact('token'));
    }




    /**
     * mailVerify
     * Send a verification email to the user with a code in case of forgetting password.
     * Success Cases :
     * 1) return true to ensure that the email has been sent.
     * failure Cases:
     * 1) username is not found.
     *
     * @bodyParam username string required The user's username.
     */

    public function mailVerify()
    {
        return;
    }




    /**
     * checkCode
     * Check whether the user entered the correct reset code sent to his email.
     * Success Cases :
     * 1) return true to verify the code if it matches (the user is then redirected to the change password page).
     * failure Cases:
     * 1) Code is invalid.
     *
     * @bodyParam code int required The entered code.
     */

    public function checkCode()
    {
        return;
    }




    /**
     * logout
     * Logs out a user.
     * Success Cases :
     * 1) return true to ensure that the user is logout successfully.
     * failure Cases:
     * 1) user ID already logged out.
     * 2) NoAccessRight token is not authorized.
     *
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
     * me
     * Returns the identity of the user logged in.
     * Success Cases :
     * 1) return the user ID of the sent token.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     */

    public function me(Request $request)
    {
        try {
            //Parsing the given token, trying to login and getting user data
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                /*Returning error if the token is a valid JWT but the encoded
                user doesn't exist with 404 status code*/
                return response()->json(['user_not_found'], 404);
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
