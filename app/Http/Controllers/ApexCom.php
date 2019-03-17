<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\subscriber;
use App\apexCom as apexComModel;
use App\apexBlock;
use App\User;
use App\Http\Controllers\Account;

/**
 * @group ApexCom
 *
 * Controls the ApexCom info , posts and admin.
 */

class ApexCom extends Controller
{

    /**
     * about
     * to get data about an ApexCom (moderators , contributors , rules , description and subscribers count).
     * Success Cases :
     * 1) return the information about the ApexCom.
     * failure Cases:
     * 1) NoAccessRight the token does not support to view the about information.
     * 2) ApexCom fullname (ApexCom_id) is not found.
     *
     * @bodyParam ApexCom_id string required The fullname of the community.
     * @bodyParam _token JWT required Verifying user ID.
     */

    public function about(Request $request)
    {
        $account = new Account();
        
        // getting the user_id related to the token in the request and validate.
        $user_id = $account->me($request);
        
        if (!$user_id) {
            return response()->json(['error' => 'invalid user'], 404);
        }
        
        $apex_id = $request['ApexCom_id'];
        
        // return an error message if the id (fullname) of the apexcom was not found.
        if(!$apex_id){
            return response()->json(['error' => 'ApexComm is not found.'], 404);
        }
        
        // check if the validated user was blocked from the apexcom.
        $blocked = apexBlock::where([
            ['ApexID', '=',$apex_id],['blockedID', '=',$user_id] ])->count();
            
        // return an error for if the user was blocked from the apexcom.
        if($blocked != 0){
            return response()->json(['error' => 'You are blocked from this Apexcom'], 404);
        }
        
    }



    /**
     * posts
     * to post text , image or video in any ApexCom.
     * Success Cases :
     * 1) return true to ensure that the post was added to the ApexCom successfully.
     * failure Cases:
     * 1) NoAccessRight the token does not support to Create a post in this ApexCom.
     * 2) ApexCom fullname (ApexCom_id) is not found.
     * 3) Not including text , image or video in the request.
     * 4) NoAccessRight token is not authorized.
     *
     * @bodyParam ApexCom_id string required The fullname of the community where the post is posted.
     * @bodyParam body string The text body of the post.
     * @bodyParam img_name string The attached image to the post.
     * @bodyParam video_url string The url to attached video to the post.
     * @bodyParam isLocked bool To allow or disallow comments on the posted post.
     * @bodyParam _token JWT required Verifying user ID.
     */

    public function submitPost()
    {
        return;
    }





    /**
     * subscribe
     * for a user to subscribe in any ApexCom.
     * Success Cases :
     * 1) return true to ensure that the subscription or unsubscribtion has been done successfully.
     * failure Cases:
     * 1) NoAccessRight the token does not support to subscribe this ApexCom.
     * 2) ApexCom fullname (ApexCom_id) is not found.
     *
     * @bodyParam ApexCom_id string required The fullname of the community required to be subscribed.
     * @bodyParam _token JWT required Verifying user ID.
     */


    public function subscribe(Request $request)
    {
        $account = new Account();
        
        // getting the user_id related to the token in the request and validate.
        $user_id = $account->me($request);
        
        if (!$user_id) {
            return response()->json(['error' => 'invalid user'], 404);
        }
        
        $apex_id = $request['ApexCom_id'];
        
        // return an error message if the id (fullname) of the apexcom was not found.
        if(!$apex_id){
            return response()->json(['error' => 'ApexComm is not found.'], 404);
        }
        
        // check if the validated user was blocked from the apexcom.
        $blocked = apexBlock::where([
            ['ApexID', '=',$apex_id],['blockedID', '=',$user_id] ])->count();
            
        // return an error for if the user was blocked from the apexcom.
        if($blocked != 0){
            return response()->json(['error' => 'You are blocked from this Apexcom'], 404);
        }
        
        // get if the user was previously subscribing the apexcom.
        $unsubscribe = subscriber::where([
            ['apexID', '=',$apex_id],['userID', '=',$user_id] ])->count();

        // unsubscribe if previously subscribed and return true to ensure the success of unsubscribe.
        if($unsubscribe)
        {
            subscriber::where([
                ['apexID', '=',$apex_id],['userID', '=',$user_id] ])->delete();

            return response()->json([1], 200);
        }

        // if not previously subscribed then subscribe and store it in the database.
        subscriber::create([
            'apexID' => $apex_id ,
            'userID' => $user_id
        ]);

        // return true to ensure the success of subscription.
        return response()->json([1], 200);
    }



    /**
     * siteAdmin
     * used by the site admin to create new ApexCom.
     * Success Cases :
     * 1) return true to ensure that the ApexCom was created  successfully.
     * failure Cases:
     * 1) NoAccessRight the token does not support to Create an ApexCom ( not the admin token).
     * 2) Wrong or unsufficient submitted information.
     *
     * @bodyParam ApexCom_name string required The name of the community.
     * @bodyParam description string required The description of the community.
     * @bodyParam rules string required The rules of the community.
     * @bodyParam img_name string The attached image to the community.
     * @bodyParam _token JWT required Verifying user ID.
     */

    public function siteAdmin()
    {
        return;
    }
}
