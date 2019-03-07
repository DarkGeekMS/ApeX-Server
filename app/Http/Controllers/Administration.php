<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Adminstration
 *
 * APIs for managing the controls of admins and moderators 
 */
class Administration extends Controller
{

/**
*DeleteApexCom 
*Deleting the subreddit by the admin
* @bodyParam SubredditID string required The ID of the subreddit to be deleted.
* @bodyParam token JWT required Used to verify the admin.

*/

  public function DeleteApexCom()
  {return;}

/**
*DeleteUser
*Deleting a user by the admin 
* @bodyParam UserID string required The ID of the user to be deleted.
* @bodyParam Reason string The reason for deleting the user. 
* @bodyParam token JWT required Used to verify the admin.
*/

  public function DeleteUser()
  {return;}

/**
*AddModerator 
*Adding a moderator for a subreddit
* @bodyParam SubredditID string required The ID of the subreddit.
* @bodyParam token JWT required Used to verify the moderator.
*/

  public function AddModerator()
  {return;}

}
