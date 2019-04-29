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
use App\Models\Hidden;
use App\Models\SavePost;
use App\Models\User;
use App\Models\Post;
use App\Models\Code;
use Illuminate\Support\Facades\Storage;
use App\Models\Message;
use Illuminate\Http\Response;

/**
 * @group Account
 *
 * Controls the authentication, info and messages of any user account.
 */

class AccountController extends Controller
{

  /**
   * Registers the given user into the website.
   *
   * The function takes the email, username and password and validates them
   * if the validation is failed it will return an error response and if it is
   * successeded it will generate a new id for the new user then it will hash its
   * password and creates a new user with the given data and creates a default
   * avatar then it will save the user into the database then it will generate a
   * JWT token from its data and returns the token with the data as a response.
   *
   * @param string email The user's email.
   * @param string username The user's username.
   * @param string password The user's password.
   *
   * @return json the user data and the token.
   *
   */

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
        $validator1 = Validator::make(
            $request->all(),
            [
            'email' => 'required|string|email|max:100|unique:users'
            ]
        );

        //Returning the validation errors in case of validation failure
        if ($validator1->fails()) {
            return response()->json(['error' => 'Invalid email or Email already exists'], 400);
        }

        $validator2 = Validator::make(
            $request->all(),
            [
            'password' => 'required|string|min:6'
            ]
        );

        //Returning the validation errors in case of validation failure
        if ($validator2->fails()) {
            return response()->json(['error' => 'Invalid password less than 6 chars'], 400);
        }
        $validator3 = Validator::make(
            $request->all(),
            [
            'username' => 'required|string|alpha_dash|max:50|unique:users',
            'avatar' => 'image'
            ]
        );

        //Returning the validation errors in case of validation failure
        if ($validator3->fails()) {
            return response()->json(['error' => 'Username already exists'], 400);
        }

        $lastUser =User::withTrashed()->selectRaw('CONVERT(SUBSTR(id,4), INT) AS intID')->get()->max('intID');
        $id = 't2_'.(string)($lastUser +1);

        $requestData = $request->all();
        $requestData['id'] = $id;

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
     * Signs in the user into the website.
     *
     * The function first extracts the credentials of the user and checks for them
     * if they are wrong it will return an error message, else it will generate a
     * jwt token and returns it.
     *
     * @param string username The user's username.
     * @param string password The user's password.
     *
     * @return JWT The user's JWT token.
     *
     */

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
     * Sends a code to the email to reset password.
     *
     * The function first validates the input username and if the validator fails it
     * will return an error else it will check if the user exists in the website if
     * it doesn't exist it will return an error, Then it will generate random code
     * and send it to the user's email, Then it will delete all codes in the
     * database asssociated with the user if exists then it will save the new code
     * in the database and return a success message.
     *
     * @param string username The user's username.
     *
     * @return Json A status message indicating the mail is sent or not.
     *
     */

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
            'username' => 'string',
            'email' => 'required|email'
            ]
        );

        //Returning the validation errors in case of validation failure
        if ($validator->fails()) {
            //converting the errors to json and returning them with 400 status code
            return response()->json($validator->errors(), 400);
        }
        //Getting the username from the request
        $email = $request->input("email");
        //Selecting the user from the database
        $user = User::where("email", $email)->first();
        if ($user) { // Checking if the user exists
            $authorized = 0;
            if ($request->has('password')) {
                $credentials = $request->only(['email' , 'password']);
                if (JWTAuth::attempt($credentials)) {
                    $authorized = 1;
                }
            }
            if ($request->has('email')) {
                if ($request->input('username') == $user->username) {
                    $authorized = 1;
                }
            }

            if (!$authorized) {
                return response()->json(['msg' => 'not authorized'], 400);
            }

            try {
                $codeText = Str::random(15); // Generating random code
                //Sending the email with random code
                \Mail::to($user)->send(new ForgetPassword($codeText));
            } catch (\Swift_TransportException $e) {
                /*Returning json response with status code 400
                 indicating an error in sending*/
                return response()->json(['msg' => $e->getMessage()], 400);
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
     * Check the forgot password code to be correct.
     *
     * The function firstly checks for the input data and if the validator is
     * failed it will return an error then it will extract the code and username
     * from the data and get the stored code of the user and compares the 2 codes
     * if the codes are matching then it will return true to indicate that the code
     * is correct, Else it will return false.
     *
     * @param string email The user's email.
     * @param string code The user's forgot password code.
     *
     * @return Json a boolean value to indicate whether the code is correct or not.
     *
     */

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
     * @bodyParam email string required The user's email.
     */

    public function checkCode(Request $request)
    {
        //Validating the input parameters of the request
        $validator = Validator::make(
            $request->all(),
            [
            'email' => 'required|email',
            'code' => 'required|string'
            ]
        );

        //Returning the validation errors in case of validation failure
        if ($validator->fails()) {
            //converting the errors to json and returning them with 400 status code
            return response()->json($validator->errors(), 400);
        }

        $codeText = $request->input('code'); //Getting the code from request
        $email = $request->input('email'); // Getting the username
        $user = User::where('email', $email)->first(); //Getting user from DB
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
     * Logs out a user from the website.
     *
     * The function firstly extracts the token and invalidates it if any error
     * happens it will return an error message, else it will return the token
     * value equals to null to indicate a successfull logout.
     *
     * @param JWT token The user's JWT token.
     *
     * @return Json returns null or an error message.
     *
     */

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
     * Delete Message
     * Validate the input by checking that the given message id is valid and exists,
     * or return an error message. Check that the logged-in user is authorized
     * and get his id or return an error message.
     * If the user is the sender of the message check that the message isn't already
     * deleted from the sender and then mark it as deleted form the sender,
     * or return that it's already deleted.
     * If the user is the receiver of the message do like above but from the receiver
     * view instead of the sender.
     * If the message is deleted from both the sender and receiver,
     * delete it entirely form the database.
     * Return a message that contains that the message is deleted successfully
     *
     * @param Request $request
     *
     * @return Resposne
     */
    /**
     * Delete message
     * Delete a private message or a reply to a message. Either the receiver or the
     * sender can delete a message. If both the receiver and the sender
     * have deleted the message, then it's deleted entirely from the database,
     * If a message is deleted, all its replies will be deleted.
     *
     * ###Success Cases :
     * 1.The parameters are valid, return json contains
     *  "the message is deleted successfully" (status code 200).
     *
     * ###Failure Cases:
     * 1. Message ID is not found. (status code 404)
     * 2. The user is not the sender nor the receiver of the message. (status code 400)
     * 3. The message is already deleted from the current user
     *  but still not deleted from the other user. (status code 400)
     * 4. The `token` is invalid, and the user is not authorized. (status code 400)
     *
     * @authenticated
     *
     * @response 200 {"result":"The message is deleted successfully"}
     * @response 404 {"error":"message ID is not found"}
     * @response 400 {"error":"The user is not the sender nor the receiver of the message"}
     * @response 400 {"error":"The message is already deleted from the sender"}
     * @response 400 {"error":"The message is already deleted from the receiver"}
     * @response 400 {"error":"Not authorized"}
     *
     * @bodyParam id string required The id of the message to be deleted.
     * @bodyParam token JWT required Used to verify the user.
     */
    public function deleteMsg(Request $request)
    {
        $validator = validator($request->only('id'), ['id' => 'required|string']);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $userID = $this->me($request)->getData()->user->id;
        $msgID = $request['id'];
        $record = Message::find($msgID);
        if (!$record) {
            return response()->json(['error' => 'message ID is not found'], 404);
        }
        if ($record->sender == $userID) {
            if ($record->delSend == true) {
                return response()->json(
                    ['error' => 'The message is already deleted from the sender'],
                    400
                );
            } else {
                $record->delSend = true;
                $record->save();
            }
        } elseif ($record->receiver == $userID) {
            if ($record->delReceive == true) {
                return response()->json(
                    ['error' => 'The message is already deleted from the receiver'],
                    400
                );
            } else {
                $record->delReceive = true;
                $record->save();
            }
        } else {
            return response()->json(
                ['error' => 'The user is not the sender nor the receiver of the message'],
                400
            );
        }
        //check if the message is deleted from both the sender and the receiver
        if ($record->delSend == true && $record->delReceive == true) {
            $record->delete();
        }

        return response()->json(
            ['result' => 'The message is deleted successfully']
        );
    }


     /**
      * readMsg.
      * This Function is used to read a sent message.
      *
      * it receives the token of the logged in user.
      * it gets the id of the sent message.
      * then it checks that a message exists with the given id.
      * if not it returns an error message.
      * then it gets the subject and the content of the message with the given id and all its replies.
      *
      * @param string token the JWT representation of the user, admin or moderator.
      * @param string  ID The id of the message.
      * must be at least 4 chars starts with t4_.
      * @return Json deleted , the subject and the content of the message and all its replies.
      */

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
     * @response  500{
     * "error" : "Message doesnot exist"
     * }
     */

    public function readMsg(Request $request)
    {
        //get the logged in user id
        $account=new AccountController;
        $user=$account->me($request)->getData()->user;
        $id=$user->id;
        //validate that the input data is correct
        $validator = validator(
            $request->all(),
            ['ID' => 'required|string']
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }
        //get the id of the message
        $msgid= $request['ID'];
        $msgCheck=DB::table('messages')->where('id', '=', $msgid)->get();
        //if the message doesnot exist return an error message
        if (count($msgCheck)==0) {
            return response()->json(['error' => 'Message doesnot exist'], 500);
        }
        //get the subject and the content of the message and all its replies
        $subject=DB::table('messages')->where('id', '=', $msgid)->select('subject')->get();
        $msg=DB::table('messages')->join('users', 'messages.receiver', '=', 'users.id')
            ->where('messages.id', '=', $msgid)
            ->orWhere('messages.parent', $msgid)
            ->orderBy('messages.created_at', 'asc')
            ->select('username', 'content', 'messages.created_at')
            ->get();

        $json_output=response()->json(['message' =>$msg ,'subject'=>$subject ], 200);
        return $json_output;
    }


    /**
     * Changes the preferences of the user.
     *
     * The function firstly validates the input data of the user to check
     * if they are valid then it gets the user data from the given token.
     * then it checks if there is other users with the given username or email
     * except the original user, If this is the case then it returns error
     * else it stores the data and then it extracts the avatar from the request
     * then it stores it and stores its directory in the database then the
     * then it returns true to indicate the success.
     *
     * @param JWT token The user's JWT token.
     * @param string username The user's username.
     * @param string email The user's email.
     * @param string fullname The user's fullname.
     * @param string notification The user's notification enable value.
     * @param avatar image the avatar of the user.
     *
     * @return boolean returns true or an error message.
     *
     */

    /**
     * updates
     * Updates the preferences of the user.
     * Success Cases :
     * 1) return true to ensure that the data updated successfully.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) the changed email already exists.
     *
     * @bodyParam username string required Enable changing the username.
     * @bodyParam fullname string required Enable changing the fullname.
     * @bodyParam email string required Enable changing the email.
     * @bodyParam avatar string required Enable changing the profile picture.
     * @bodyParam notifications bool Enable notifications.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function updates(Request $request)
    {
        //validating the email to be correct
        $validator1 = Validator::make(
            $request->all(),
            [
            'email' => 'required|string|email|max:100'
            ]
        );

        //Returning the validation errors in case of validation failure
        if ($validator1->fails()) {
            return response()->json(['error' => 'Invalid email or Email already exists'], 400);
        }
        //validating username
        $validator2 = Validator::make(
            $request->all(),
            [
            'username' => 'required|string|alpha_dash|max:50'
            ]
        );
        //returning errors in the case of username failure
        if ($validator2->fails()) {
            return response()->json(['error' => 'Username already exists'], 400);
        }
        //validating the input avatar
        $validator3 = Validator::make(
            $request->all(),
            [
                'avatar' => 'image'
            ]
        );
        //returning error in the case of avatar failure.
        if ($validator3->fails()) {
            return response()->json(['error' => 'Avatar is not valid'], 400);
        }
        $account = new AccountController;
        $user = $account->me($request)->getData()->user; // Getting user data
        $id = $user->id; // Getting id
        $user = User::where("id", $id)->first(); //Getting the user from database
        $requestData = $request->all(); // Getting request data
        // Getting number of previous users with the input username
        $prevUsers = count(User::where("username", $requestData["username"])->get());
        //checking if there is users otherthan the given user
        if ($prevUsers && $user->username != $requestData["username"]) {
            return response()->json(["error" => "username exists"], 400);
        }
        //Getting number of previous users with the input email.
        $prevEmails = count(User::where("email", $requestData["email"])->get());
        //Checking if there is users otherthan the given user
        if ($prevEmails && $user->email != $requestData["email"]) {
            return response()->json(["error" => "email already exists"], 400);
        }
        //Updating the user data
        $user->username = $requestData["username"];
        $user->email = $requestData["email"];
        $user->fullname = $requestData["fullname"];
        $user->notification = $requestData["notification"];
        //checking if the request has an input avatar
        if ($request->hasfile('avatar')) {
            //getting avatar object
            $img = $request->file('avatar');
            $imgName = $img->getClientOriginalName(); //Getting image name
            $extention = explode(".", $imgName)[1]; // Getting extension
            $dir = "avatars/users/"; // initializing the directroy
            $img->storeAs($dir, $user->id.".".$extention, "public"); //stroing avatar
            $dir = "storage/".$dir.$user->id.".".$extention; // setting the directory
            $user->avatar = $dir; // stroing the directory.
        }
        $user->save(); // saving the changes
        return response()->json(true, 200); // returning true with success response.
    }


    /**
     * Gets the preferences of the user.
     *
     * The function gets the user associated with the given token then it returns
     * its username, email, fullname, avatar and notification settings then it
     * returns then in a json response.
     *
     * @param JWT token The user's JWT token.
     *
     * @return Json returns user preferences as json with keys username, email,
     * fullname, avatar and notification.
     *
     */

    /**
     * prefs
     * Returns the preferences of the user.
     * Success Cases :
     * 1) return the preferences of the logged-in user.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     * @response{
     * "username":"Azzoz",
     * "email":"Azzoz@hotmail.com",
     * "fullname":"Azzoz mando",
     * "avatar":"storage/users/default.jpg",
     * "notification":1
     * }
     */

    public function prefs(Request $request)
    {
        $account = new AccountController;
        //getting user info from the token
        $user = $account->me($request)->getData()->user;
        $user = User::where("id", $user->id)->first();
        //returning the user data in an array
        $user = [
            "username" => $user->username,
            "email" => $user->email,
            "fullname" => $user->fullname,
            "avatar" => $user->avatar,
            "notification" => $user->notification
        ];
        return response()->json($user, 200);
    }


    /**
     * Returns the user of the sent token.
     *
     * The function extracts the token given in the request then it checks if it
     * corresponds to an existing user then it will return an error if that is
     * case else it will return the user object of the token.
     *
     * @param JWT token The user's token.
     *
     * @return Json The user's object as json or an error message.
     *
     */

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
     * changePassword
     * to change the password of any user.
     * Success Cases :
     * 1) return ture to ensure the password updated successfully.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) old password not right.
     * 3) new password is less than 6 chars.
     * 4) Code is invalid.
     *
     * @param token JWT Used to verify the user.
     * @param withcode bool required changing password using forgot code or not.
     * @param password string required the new password.
     * @param username string required the username.
     * @param key string required the forgot password code or the old password.
     *
     * @return boolean return true if the password change, otherwise an error.
     */

     /**
      * Change password whether with the old password or the forgot password code
      *
      * The function first check if i want to change the password using the code.
      * or by inputting the old password, IN the first option we won't require a
      * token if we change it with the code first i will compare the code with the
      * code in the database then if it is true i will change the password
      * and delete the code, If we change without code, We will compare
      * the old password with the given one and if they are match we will
      * change the password.
      *
      * @bodyParam token JWT Used to verify the user.
      * @bodyParam withcode bool required changing password using forgot code or not.
      * @bodyParam password string required the new password.
      * @bodyParam username string required the username.
      * @bodyParam key string required the forgot password code or the old password.      *
      * @return Json The user's object as json or an error message.
      *
      */


    public function changePassword(Request $request)
    {
        //validating the password
        $validator = Validator::make(
            $request->all(),
            [
            'password' => 'required|string|min:6'
            ]
        );
        //returning an error if the password is not as required
        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid password less than 6 chars'], 400);
        }
        $requestData = $request->all(); //Getting the request data
        //whether to change password with code or not
        $withCode = $requestData["withCode"];
        $username = $requestData["username"]; //Getting username
        if ($withCode == "1") {
            $code = $requestData["key"]; //Getting the code
            $username = $requestData["username"]; //Getting username
            $user = User::where("username", $username)->first(); //Get user from DB
            if (!$user) { //Checking for the user
                return response()->json(["error" => "user doesn't exist"]);
            }
            $storedCode = Code::where("id", $user->id)->first(); //Get code from DB
            if ($storedCode) { //check for the code
                if ($storedCode->code == $code) { //check if codes are equal
                    //hashing the new password
                    $newpass = Hash::make($requestData["password"]);
                    $user->password = $newpass; //setting password
                    $user->save(); //saving changes
                    Code::where("id", $user->id)->delete(); //Deleting the code
                    return response()->json(true, 200); // returning true
                } else {
                    //returning error
                    return response()->json(["error" => "Invalid code"], 400);
                }
            } else {
                //returning error
                return response()->json(["error" => "Invalid code"], 400);
            }
        } else {
            //creating new account
            $account = new AccountController;
            $user = $account->me($request)->getData(); //get user from token
            if (!isset($user->user)) { //checking for user
                //returning error
                return response()->json(["error" => "invalid token"], 400);
            }
            $user = $user->user; //getting user
            $user = User::where("id", $user->id)->first(); // get user from DB
            $oldpass = $requestData["key"]; //getting old pass
            $newpass = Hash::make($requestData["password"]); //hashing the new one
            $username = $user->username; //Getting username
            //setting credentials
            $credentials = [
                "username" => $username,
                "password" => $oldpass
            ];
            //try to login with the old password and username
            if (JWTAuth::attempt($credentials)) {
                $user->password = $newpass; //changin password
                $user->save(); //saving changes
                return response()->json(true, 200); //return success
            } else {
                //return error
                return response()->json(["error" => "old password is not correct"], 400);
            }
        }
    }

    /**
      * profileInfo.
      * This Function is used to return the profile info of the user.
      *
      * it receives the token of the logged in user.
      * it gets the personal information (username, profile picture , karma count) of the logged in user
      * then it checks if the user is a moderator (type=2) it gets the apexcoms the user moderates.
      * it gets the posts posted by the user and his vote and save statuses.
      * it gets the saved and hidden posts by the user.
      * then it returns all the profile information.
      *
      * @param string token the JWT representation of the user, admin or moderator.
      * @return Json profile , user profile information.
      */

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

    public function profileInfo(Request $request)
    {
        //get the logged in user id and type
        $account=new AccountController;
        $user=$account->me($request)->getData()->user;
        $type=$user->type;
        $id=$user->id;

        //get the personal information (username, profile picture , karma count)of the logged in user
        $info=DB::table('users')->where('id', '=', $id)->select('username', 'avatar', 'karma')->get();

        //get the posts posted by the user and his vote and save statuses
        $posts=Post::query()->where('posted_by', $id)->orderby('created_at', 'asc')->get();
        $posts->each(
            function ($posts) use ($id) {
                $posts['userVote'] = $posts->userVote($id);
            }
        );
        $hiddens= Hidden::where('userID', $id)->pluck('postID');
        $saved = SavePost::where('userID', $id)->pluck('postID');
        //get the saved and hidden posts by the logged in user
        $savedPosts=Post::query()->whereIn('id', $saved)->get();
        $hiddenPosts=Post::query()->whereIn('id', $hiddens)->get();

        $json_output=response()->json(['user_info' =>$info ,'posts'=>$posts ,
            'saved_posts'=>$savedPosts ,'hidden_posts'=>$hiddenPosts ]);

        return $json_output;
    }

    /**
      * blockList.
      * This Function is used to return the blocked users name & IDs by the logged in user.
      *
      * it receives the token of the logged in user.
      * it returns a list of the names and ids of the blocked users by the logged in useer
      *
      * @param string token the JWT representation of the user, admin or moderator.
      * @return Json blocklist , list of the blocked users by the logged in user.
      */


    /**
     * blockList
     * Returns the blocked users name & IDs by the logged in user.
     * Success Cases :
     * 1) return the list of the blocked users.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     */


    public function blockList(Request $request)
    {
        //get the logged in user id
        $account=new AccountController;
        $user=$account->me($request)->getData()->user;
        $id=$user->id;
        //get the blocklist of the logged in user
        $blocklist=DB::table('blocks')->join('users', 'blocks.blockedID', '=', 'users.id')
        ->where('blocks.blockerID', '=', $id)->select('users.username', 'users.id')->get();
        return response()->json(['blocklist' =>$blocklist]);
    }

    /**
     * Get Inbox Messages
     * Validate the input by checking that the logged-in user is authorized
     * and get his id or return an error message.
     * Check that the `max` is a valid integer or return an error message.
     * If the `max` is not given don't limit the result.
     * Get the messages that is not replies, order them by latest messages,
     * limit them by `max` and select all attributes except
     * `delSent`, `delReceived` and `received`.
     * Get from the messages the messages that is sent by the user, the messages
     * that are received and read by him and the messages that are received
     * and not read, then collect the `read` and `unread` messages in `all`.
     * Return the sent messages and the received messages that are divided into
     * `read`, `unread` and `all`.
     *
     * @param Request $request
     *
     * @return Response
     */
    /**
     * Get Inbox Messages
     * Return a json contains the not-deleted inbox messages (without its replies)
     *  of the current user divided into `sent` and `received` messages,
     *  and the `received` messages are divided into `read`, `unread` and `all`
     *  that contain both `read` and `unread` messages,
     *  all messages are sorted by latest messages.
     *
     * ###Success Cases :
     * 1. The logged-in user is authorized,
     *  return the result successfully (status code 200)
     *
     * ###Failure Cases:
     * 1. The `token` is invalid, or the user is not found. (status code 400 or 404)
     * 2. The `max` is invalid (status code 400)
     *
     * @authenticated
     *
     * @responseFile 200 responses\validInbox.json
     * @responseFile 404 responses\userNotFoundJWTMiddlewareAuthentication.json
     * @responseFile 400 responses\notAuthorized.json
     * @responseFile 400 responses\maxMustBeInt.json
     *
     * @bodyParam max int the maximum number of messages to be returned (default is no limit).
     * @bodyParam token JWT required Used to verify the user.
     */
    public function inbox(Request $request)
    {
        $validator = validator($request->only('max'), ['max' => 'int|nullable']);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $limit = $request->input('max', null);
        $userID = $this->me($request)->getData()->user->id;

        $messages = Message::notReply()->with('sender:id,username')
            ->with('receiver:id,username')->latest()->take($limit)
            ->select('id', 'content', 'subject', 'sender', 'receiver', 'created_at', 'updated_at');

        $sent = clone $messages;
        $read = clone $messages;
        $unread = clone $messages;

        $sent = $sent->sentBy($userID)->get();

        $read = $read->receivedBy($userID)->read();

        $unread = $unread->receivedBy($userID)->unread();

        $all = clone $read;
        $all = $all->union($unread)->latest()->get();  //all received messages

        $read = $read->get();
        $unread = $unread->get();

        $received = compact('read', 'unread', 'all');

        return compact('sent', 'received');
    }
}
