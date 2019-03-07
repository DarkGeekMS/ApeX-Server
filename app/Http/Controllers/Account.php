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
* @bodyParam title string required The title of the post.
* @bodyParam body string required The title of the post.
* @bodyParam type string The type of post to create. Defaults to 'textophonious'.
* @bodyParam author_id int the ID of the author
* @bodyParam thumbnail image This is required if the post type is 'imagelicious'.
*/

  public function DeleteMsg()
  {return;}



  /**
* @bodyParam ID string required The id of the user who sent the message.
* @bodyParam body string required The body of the message.
* @bodyParam read bool optional  mark the message as read by setting it true.
* @bodyParam token JWT required Used to verify the user recieving the message.
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
* @bodyParam ID string required The ID of the user.
* @bodyParam token JWT required Used to verify the user.
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
