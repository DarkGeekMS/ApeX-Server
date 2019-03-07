<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group #Links and comments
 *
 * controls the comments , replies and private messages for each user
 */

class Comment extends Controller
{

/**
* submit a new comment or reply to a comment on a post.
* @bodyParam name string required The fullname of the comment to be submitted ( comment , reply , message).
* @bodyParam content string required The body of the comment.
* @bodyParam parent_ID string required The fullname of the thing to be replied to.
* @bodyParam AuthID JWT required Verifying user ID.
* Success Cases :
* 1) return true to ensure that the comment , reply is added successfully.
* failure Cases:
* 1) post fullname (ID) is not found.
*/

  public function Add()
  {return;}



  /**
* to delete a post or comment or reply from any ApexCom by the owner of the thing or the moderator of this ApexCom.
* @bodyParam name string required The fullname of the post,comment or reply to be deleted.
* @bodyParam ID JWT required Verifying user ID.
* Success Cases :
* 1) return true to ensure that the post, comment or reply is deleted successfully.
* failure Cases:
* 1) NoAccessRight the token is not for the owner of the thing to be deleted or the moderator of this ApexCom.
* 2) post , comment or reply fullname (ID) is not found.
*/

  public function Delete()
  {return;}



  /**
* to edit the text of a post , comment or reply by its owner.
* @bodyParam name string required The fullname of the self-post ,comment or reply to be edited.
* @bodyParam content string required The body of the thing to be edited.
* @bodyParam ID JWT required Verifying user ID.
* Success Cases :
* 1) return true to ensure that the post or comment updated successfully.
* failure Cases:
* 1) NoAccessRight the token is not for the owner of the post or comment to be edited
* 2) post or commet fullname (ID) is not found.
*/

  public function EditText()
  {return;}




  /**
* to hide a post from the user view.
* @bodyParam name string required The fullname of the post to be hidden.
* @bodyParam ID JWT required Verifying user ID.
* Success Cases :
* 1) return true to ensure that the post hidden.
* failure Cases:
* 1) post fullname (ID) is not found or already hidden.
*/

  public function Hide()
  {return;}




  /**
* to unhide the post from the user's hidden posts list so it will display in the user view.
* @bodyParam name string required The fullname of the post to be unhidden.
* @bodyParam ID JWT required Verifying user ID.
* Success Cases :
* 1) return true to ensure that the post unhidden.
* failure Cases:
* 1) post fullname (ID) is not found or already unhidden.
*/

  public function Unhide()
  {return;}




  /**
* to retrieve additional comments omitted from a base comment tree (comment , replies ).
* @bodyParam parent string required The fullname of the posts whose comments are being fetched ( post or comment ).
* @bodyParam children string required The comments or replies to be fetched.
* @bodyParam ID JWT required Verifying user ID.
* Success Cases :
* 1) return thr retrieved comments or replies (20 comment at a time ).
* failure Cases:
* 1) post , comment or reply fullname (ID) is not found for any of the parent or children IDs.
*/


  public function MoreChildren()
  {return;}




  /**
* report a post , comment or a message to the ApexCom moderator, posts or comments will be hidden implicitly as well.
* ( moderators don't report posts).
* @bodyParam name string required The fullname of the post,comment or message to report.
* @bodyParam reason int The index represent the reason for the report from an associative array (will be in frontend and backend as well).
* @bodyParam ID JWT required Verifying user ID.
* Success Cases :
* 1) return true to ensure that the report is sent to the moderator of the ApexCom.
* failure Cases:
* 1) send reason (index) out of the associative array range.
* 2) missing token.
*/

  public function Report()
  {return;}



  /**
* cast a vote on a post , comment or reply.
* @bodyParam name string required The fullname of the post,comment or reply to vote on.
* @bodyParam dirction int required The direction of the vote ( 1 up-vote , -1 down-vote , 0 un-vote).
* @bodyParam ID JWT required Verifying user ID.
* Success Cases :
* 1) return total number of votes on this post,comment or reply.
* failure Cases:
* 1) fullname of the thing to vote on is not found.
* 2) direction of the vote is not integer between -1 , 0 , 1.
*/

  public function Vote()
  {return;}

//-----------------------------------------------------------------------------------------------------------------

  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
* Success Cases :
* 1)
* 2)
* 3)
* failure Cases:
* 1)
* 2)
*/

  public function Save()
  {return;}



  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
* Success Cases :
* 1)
* 2)
* 3)
* failure Cases:
* 1)
* 2)
*/

  public function UnSave()
  {return;}

}
