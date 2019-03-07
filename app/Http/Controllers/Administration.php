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
   *Deleting a subreddit by a moderator (the owner of the subbreddit) 
* @bodyParam ID string required The ID of the moderator in charge of the subbredit.
* @bodyParam SubredditID string required The ID of the subreddit to be deleted.
* @bodyParam token JWT required Used to verify the moderator.

*/

  public function DeleteApexCom()
  {return;}

  /**
   *Deleting a user
* @bodyParam UserID string required The ID of the user to be deleted.
* @bodyParam AdminID string required The ID of the admin deleting the user.
* @bodyParam Reason string The reason for deleting the user. 
* @bodyParam token JWT required Used to verify the admin.
*/

  public function DeleteUser()
  {return;}

  /**
   *Adding a moderator for a subreddit
* @bodyParam ID string required The ID of the moderator in charge of the subbredit.
* @bodyParam SubredditID string required The ID of the subreddit controlled by the moderator.
* @bodyParam token JWT required Used to verify the moderator.
*/

  public function AddModerator()
  {return;}

}
