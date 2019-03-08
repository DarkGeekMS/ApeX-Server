<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Moderation extends Controller
{

  /** 
   * @bodyParam ApexCom_id string required The fullname of the community where the comment or post is removed.
   * @bodyParam id string required The fullname of the comment or post to be removed.
   * @bodyParam _token string required The token required for authentication.
   * Success Cases :
   * 1) return true to ensure that the post or comment is removed successfully.
   * failure Cases:
   * 1) NoAccessRight the token is not for the moderator of this ApexCom including the post or comment to be removed.
   * 2) post or comment fullname (id) is not found.
*/

  public function Remove()
  {return;}



  /**
   * @bodyParam ApexCom_id string required The fullname of the community where the comment or post is approved.
   * @bodyParam id string required The fullname of the comment or post to be approved.
   * @bodyParam _token string required The token required for authentication.
   * Success Cases :
   * 1) return true to ensure that the post or comment is approved successfully.
   * failure Cases:
   * 1) NoAccessRight the token is not for the moderator of this ApexCom including the post or comment to be approved.
   * 2) post or comment fullname (id) is not found.
*/

  public function Approve()
  {return;}



  /**
   * @bodyParam ApexCom_id string required The fullname of the community where the reported comments and posts.
   * @bodyParam _token string required The token required for authentication.
   * Success Cases :
   * 1) return the reported posts and comments.
   * failure Cases:
   * 1) NoAccessRight the token is not for the moderator of this ApexCom.
   */

  public function ReviewReports()
  {return;}



}
