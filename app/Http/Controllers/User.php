<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group User
 *
 * Controls the user interaction with other users
 */

class User extends Controller
{

  /**
   * Block
   * Block a user, so he can't send private messages to the current user
* @bodyParam id string required the id of the user to be blocked.
* @bodyParam token JWT required Used to verify the user.
* Success Cases :
* 1) Return true to ensure that the user has been blocked successfully.
* failure Cases:
* 1) NoAccessRight the token is not for the user that wants to block the other user
* 2) User fullname (ID) is not found.
*/

  public function Block()
  {return;}



  /**
   * Compose
   * Send a private message to another user
* @bodyParam to string required The id of the user to be messaged.
* @bodyParam subject string required The subject of the message.
* @bodyParam mes text the body of the message.
* @bodyParam token JWT required Used to verify the user.
* Success Cases :
* 1) return true to ensure that the message has been sent successfully.
* failure Cases:
* 1) NoAccessRight the token is not for the user that wants to compose a message
* 2) The user is blocked and can't be messaged
* 3) User fullname (ID) is not found.
*/

  public function Compose()
  {return;}



  /**
   * UserDataByAccountID
   * Return user public data to be seen by another user
* @bodyParam id string required The id of an existing user.
* Success Cases :
* 1) return the data of the user successfully.
* failure Cases:
* 1) User fullname (ID) is not found.
*/

  public function UserDataByAccountID()
  {return;}


}
