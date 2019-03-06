<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Account extends Controller
{


  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

  public function SignUp()
  {return;}



  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

  public function Login()
  {return;}



  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

  public function Logout()
  {return;}



  /**
   * Delete private messages from the recipient's view of their inbox
* @bodyParam id string required The fullname of the message to be deleted.
* @bodyParam token JWT required Used to verify the user.
*/

  public function DeleteMsg()
  {return;}



  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

  public function ReadMsg()
  {return;}



  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

  public function Updates()
  {return;}



  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

  public function Prefs()
  {return;}



  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

  public function Me()
  {return;}



  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

public function ProfileInfo()
{return;}



/**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

  public function Karma()
  {return;}



  /**
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

  public function Messages()
  {return;}

}
