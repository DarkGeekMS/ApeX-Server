<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Account
 *
 * Controls the authentication, info and messages of the accounts.
 */

class Account extends Controller
{


  /**
   * Registers new user into the website by storing their email, username and password.
* @bodyParam email string required The email of the user.
* @bodyParam username string required The choosen username.
* @bodyParam password string required The choosen password.
* @bodyParam verify_password required string The repeated value of the password.

 * @response {
 *  "token":"eyJhbGciOiJIUz.JV_adQssw5c.swdwhewfw"
 * }
 * @response 406 {
 *  "message": "Username already exists"
 * }
 * @response 406 {
 *  "message": "Email already exists"
 * }
 * @response 406 {
 *  "message": "Passwords don't match"
 * }
*/

  public function SignUp()
  {return;}



  /**
   * Validates user's credentials and logs him in.
* @bodyParam username string required The user's username.
* @bodyParam password string required The user's password.
* @bodyParam remember_me bool required whether to keep the user logged in or not.
 * @response {
 *  "token":"eyJhbGciOiJIUz.JV_adQssw5c.swdwhewfw"
 * }
 * @response 406 {
 *  "message": "Username is not found"
 * }
  * @response 406 {
 *  "message": "Wrong password for the given username"
 * }
*/

  public function Login()
  {return;}



  /**
   * Logs out a user.
* @bodyParam token JWT required Used to verify the user.
 * @response {
 *  "message" : 1
 * }
 * @response 406 {
 *  "message": "Already logged out"
 * }
*/

  public function Logout()
  {return;}



  /**
   * Delete private messages from the recipient's view of their inbox.
* @bodyParam id int required The id of the message to be deleted.
* @bodyParam token JWT required Used to verify the user.
 * @response {
 *  "message":1
 * }
 * @response 403 {
 *  "message": "User doesn't have access to the given message"
 * }
*/

  public function DeleteMsg()
  {return;}




/**
*ReadMsg
*Read a sent message
* @bodyParam ID string required The id of the user who sent the message.
* @bodyParam body string required The body of the message.
* @bodyParam read bool optional  mark the message as read by setting it true.
* @bodyParam token JWT required Used to verify the user recieving the message.
*/

  public function ReadMsg()
  {return;}



  /**
   * Updates the preferences of the user
* @bodyParam change_email string required Enable changing the email
* @bodyParam change_password string required Enable changing the password
* @bodyParam deactivate_account string Enable deactivating the account
* @bodyParam media_autoplay bool Enabling media autoplay
* @bodyParam pm_notifications bool Enable pm notifications
* @bodyParam replies_notifications bool Enable notifications for replies
* @bodyParam token JWT required Used to verify the user.
 * @response {
 *  "message":1
 * }
 * @response 403 {
 *  "message": "User doesn't have access to the given message"
 * }
*/

  public function Updates()
  {return;}


  /**
   * Returns the preferences of the user.
* @bodyParam token JWT required Used to verify the user.
 * @response {
 *  "change_email":1,
 *  "change_password":0,
 *  "deactivate_account":1,
 *  "media_autoplay":0,
 *  "pm_notifications":1,
 *  "replies_notifications":0
 * }
 * @response 403 {
 *  "message": "Cannot authorize the user"
 * }
*/
  public function Prefs()
  {return;}



  /**
   * Returns the identity of the user logged in
* @bodyParam token JWT required Used to verify the user.
 * @response {
 *  "username":"Regina Falange"
 * }
 * @response 403 {
 *  "message": "Cannot authorize the user"
 * }
*/

  public function Me()
  {return;}



/**
*ProfileInfo
*Displaying the home page of the user
* @bodyParam ID string required The ID of the user.
* @bodyParam token JWT required Used to verify the user.
*/

public function ProfileInfo()
{return;}



/**
 * Returns the karma of the user
 * * @bodyParam token JWT required Used to verify the user.
  * @response {
 *  "karma":4
 * }
 * @response 403 {
 *  "message": "Cannot authorize the user"
 * }
*/

  public function Karma()
  {return;}



  /**
   * Returns a listing of the messages of the user
* @bodyParam max int the maximum number of messages to be returned
* @bodyParam token JWT required Used to verify the user.
 * @response {
 *  "after":"msg_110",
 *  "limit": 14
 * }
 * @response 403 {
 *  "message": "Cannot authorize the user"
 * }
*/

  public function Messages()
  {return;}

}
