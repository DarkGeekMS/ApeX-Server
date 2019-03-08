<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApexCom extends Controller
{

  /**
   * About
   * returns information about ApexCom
   * @bodyParam ApexCom_id string required The fullname of the community.
   * @bodyParam _token string required The token required for authentication.
   * Success Cases :
   * 1) return the information about the ApexCom.
   * failure Cases:
   * 1) NoAccessRight the token does not support to view the about information.
   * 2) ApexCom fullname (ApexCom_id) is not found.
*/

  public function About()
  {return;}



  /**
   * Post
   * It is a functionality of the user to create new posts on an ApexCom
   * @bodyParam ApexCom_id string required The fullname of the community where the post is posted.
   * @bodyParam body string required The text body of the post.
   * @bodyParam image_file file The attached image to the post.
   * @bodyParam image_type string The type of the attached image to the post(png is default, jpg).
   * @bodyParam video_url string The url to attached video to the post.
   * @bodyParam link string The link attached to the post.
   * @bodyParam _token string required The token required for authentication.
   * Success Cases :
   * 1) return true to ensure that the post was added to the ApexCom successfully.
   * failure Cases:
   * 1) NoAccessRight the token does not support to Create a post in this ApexCom.
   * 2) ApexCom fullname (ApexCom_id) is not found.
   * 3) The content of the post is not sufficient.
*/

  public function Posts()
  {return;}



 
  /**
   * Subscribe
   * It is a functionality of the user to subscribe/unsubscribe a specific ApexCom
   * @bodyParam ApexCom_id string required The fullname of the community required to be subscribed.
   * @bodyParam _token string required The token required for authentication.
   * Success Cases :
   * 1) return true to ensure that the subscription or unsubscribtion has been done successfully.
   * failure Cases:
   * 1) NoAccessRight the token does not support to subscribe this ApexCom.
   * 2) ApexCom fullname (ApexCom_id) is not found.
*/


  public function Subscribe()
  {return;}



  /**
   * Admin
   * It is a special functionality to the admin of the site as he is the only one that can create an ApexCom
   * @bodyParam ApexCom_name string required The name of the community.
   * @bodyParam description string required The description of the community.
   * @bodyParam type string required The type of the community(there are only three valid types public, restricted, private).
   * @bodyParam header_image_file file required The header image.
   * @bodyParam header_image_type string required The type of the header image (png is default, jpg).
   * @bodyParam _token string required The token required for authentication.
   * Success Cases :
   * 1) return true to ensure that the ApexCom was created or edited successfully.
   * failure Cases:
   * 1) NoAccessRight the token does not support to Create or to edit an ApexCom.
   * 2) Wrong or unsufficient submitted information.
*/

  public function Admin()
  {return;}

}
