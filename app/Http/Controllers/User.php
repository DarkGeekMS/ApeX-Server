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
*/

  public function Compose()
  {return;}



  /**
   * UserDataByAccountID
   * Return user public data to be seen by another user
* @bodyParam id string required The id of an existing user.
* @bodyParam token JWT required Used to verify the user.
*/

  public function UserDataByAccountID()
  {return;}


}
