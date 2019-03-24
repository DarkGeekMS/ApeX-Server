<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\subscriber;
use App\apexCom as apexComModel;
use App\apexBlock;
use App\User;
use App\moderator;
use App\post;
use App\Http\Controllers\Account;
use Carbon\Carbon;

/**
 * @group ApexCom
 *
 * Controls the ApexCom info , posts and admin.
 */

class ApexCom extends Controller
{

    /**
     * about
     * to get data about an ApexCom (moderators , name, contributors , rules , description and subscribers count).
     * Success Cases :
     * 1) return the information about the ApexCom.
     * failure Cases:
     * 1) NoAccessRight the token does not support to view the about information.
     * 2) ApexCom fullname (ApexCom_id) is not found.
     * 
     * @response 400 {"token_error":"The token could not be parsed from the request"}
     * @response 404 {"error":"ApexCom is not found."}
     * @response 400 {"error":"You are blocked from this Apexcom"}
     * @response 200 {"contributers_count":2,"moderators":[{"userID":"t2_3"}],"subscribers_count":0,"name":"New dawn","description":"The name says it all.","rules":"NO RULES"} 
     *
     * @bodyParam ApexCom_ID string required The fullname of the community.
     * @bodyParam token JWT required Verifying user ID.
     */

    public function about(Request $request)
    {
        $account = new Account();

        // getting the user_id and user_type related to the token in the request and validate.
        $user_id = $account->me($request);
        if (!array_key_exists('user', $user_id->getData())) {
                //there is token_error or user_not found_error
                return $user_id;
        }
        $User = $account->me($request)->getData()->user;
        $user_id = $User->id;

        $apex_id = $request['ApexCom_ID'];

        // checking if the apexCom exists.
        $exists = apexComModel::where('id', $apex_id)->count();

        // return an error message if the id (fullname) of the apexcom was not found.
        if (!$exists) {
            return response()->json(['error' => 'ApexCom is not found.'], 404);
        }

        // check if the validated user was blocked from the apexcom.
        $blocked = apexBlock::where([['ApexID', '=',$apex_id],['blockedID', '=',$user_id] ])->count();

        // return an error for if the user was blocked from the apexcom.
        if ($blocked != 0) {
            return response()->json(['error' => 'You are blocked from this Apexcom'], 400);
        }

        // getting about info (contributers_count,moderators,subscribers_count,name,description,rules)

        $contributers_count = DB::table('posts')->where('apex_id', $apex_id)
            ->select('posted_by')->distinct('posted_by')->get()->count();

        $moderators = moderator::where('apexID', $apex_id)->get('userID');

        $subscribers_count = subscriber::where('apexID', $apex_id)->count();

        $apexCom = apexComModel::find($apex_id);

        $name = $apexCom->name;

        $description = $apexCom->description;

        $rules = $apexCom->rules;

        return response()->json(
            compact(
                'contributers_count',
                'moderators',
                'subscribers_count',
                'name',
                'description',
                'rules'
            )
        );
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
     * @bodyParam token JWT required Verifying user ID.
     */

    public function submitPost(Request $request)
    {
        $account = new Account();

        // getting the user_id and user_type related to the token in the request and validate.
        $user_id = $account->me($request);
        if (!array_key_exists('user', $user_id->getData())) {
                //there is token_error or user_not found_error
                return $user_id;
        }
        $User = $account->me($request)->getData()->user;
        $user_id = $User->id;

        $apex_id = $request['ApexCom_id'];

        // checking if the apexCom exists.
        $exists = apexComModel::where('id', $apex_id)->count();

        // return an error message if the id (fullname) of the apexcom was not found.
        if (!$exists) {
            return response()->json(['error' => 'ApexCom is not found.'], 404);
        }

        // check if the validated user was blocked from the apexcom.
        $blocked = apexBlock::where(
            [['ApexID', '=',$apex_id],['blockedID', '=',$user_id]]
        )->count();

        // return an error for if the user was blocked from the apexcom.
        if ($blocked != 0) {
            return response()->json(['error' => 'You are blocked from this Apexcom'], 400);
        }
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
     * @response 400 {"token_error":"The token could not be parsed from the request"}
     * @response 404 {"error":"ApexCom is not found."}
     * @response 400 {"error":"You are blocked from this Apexcom"}
     * @response 200 [true] 
     *
     * @bodyParam ApexCom_id string required The fullname of the community required to be subscribed.
     * @bodyParam token JWT required Verifying user ID.
     */


    public function subscribe(Request $request)
    {
        $account = new Account();

        // getting the user_id and user_type related to the token in the request and validate.
        $user_id = $account->me($request);
        if (!array_key_exists('user', $user_id->getData())) {
                //there is token_error or user_not found_error
                return $user_id;
        }
        $User = $account->me($request)->getData()->user;
        $user_id = $User->id;

        $apex_id = $request['ApexCom_ID'];

        // checking if the apexCom exists.
        $exists = apexComModel::where('id', $apex_id)->count();

        // return an error message if the id (fullname) of the apexcom was not found.
        if (!$exists) {
            return response()->json(['error' => 'ApexCom is not found.'], 404);
        }

        // check if the validated user was blocked from the apexcom.
        $blocked = apexBlock::where(
            [['ApexID', '=',$apex_id],['blockedID', '=',$user_id]]
        )->count();

        // return an error for if the user was blocked from the apexcom.
        if ($blocked != 0) {
            return response()->json(['error' => 'You are blocked from this Apexcom'], 400);
        }

        // get if the user was previously subscribing the apexcom.
        $unsubscribe = subscriber::where(
            [['apexID', '=',$apex_id],['userID', '=',$user_id] ]
        )->count();

        // unsubscribe if previously subscribed and return true to ensure the success of unsubscribe.
        if ($unsubscribe) {
            subscriber::where([['apexID', '=',$apex_id],['userID', '=',$user_id] ])->delete();

            return response()->json([true], 200);
        }

        // if not previously subscribed then subscribe and store it in the database.
        subscriber::create(
            [
                'apexID' => $apex_id ,
                'userID' => $user_id
            ]
        );

        // return true to ensure the success of subscription.
        return response()->json([true], 200);
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
     * @response 400 {"token_error":"The token could not be parsed from the request"}
     * @response 400 {"error":"No Access Rights to create or edit an ApexCom"}
     * @response 400 {"name":["The name field is required."]}
     * @response 400 {"name":["The description field is required."]}
     * @response 400 {"name":["The rules field is required."]}
     * @response 400 {"name":["The name must be at least 3 characters."]}
     * @response 400 {"name":["The description must be at least 3 characters."]}
     * @response 400 {"name":["The rules must be at least 3 characters."]}
     * @response 400 {"avatar":["The avatar must be an image."]}
     * @response 200 [true]
     *
     * @bodyParam name string required The name of the community.
     * @bodyParam description string required The description of the community.
     * @bodyParam rules string required The rules of the community.
     * @bodyParam avatar string The icon image to the community.
     * @bodyParam banner string The header image to the community.
     * @bodyParam token JWT required Verifying user ID.
     */

    public function siteAdmin(Request $request)
    {
        $account = new Account();

        // getting the user_id and user_type related to the token in the request and validate.
        $user_id = $account->me($request);
        if (!array_key_exists('user', $user_id->getData())) {
                //there is token_error or user_not found_error
                return $user_id;
        }

        $User = $account->me($request)->getData()->user;
        $user_id = $User->id;

        // checking the type of the user if not an admin no access rights
        $user_type = $User->type;
        if ($user_type != 3) {
            return response()->json(['error' => 'No Access Rights to create or edit an ApexCom'], 400);
        }

        // validate data of the request.
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|max:100',
                'description' => 'required|min:3|max:800',
                'rules' => 'required|min:3|max:100',
                'avatar' => 'image',
                'banner' => 'image'
            ]
        );
        //Returning the validation errors in case of invalid requestdata
        if ($validated->fails()) {
            return response()->json($validated->errors(), 400);
        }

        // check if apexcom exists update its information if not then create a new apexcom
        // and return true

        $exists = apexComModel::where('name', $request['name'])->count();

        if (!$exists) {
            // making the id of the new apexcom and creating it
            $count = apexComModel::selectRaw(
                'SUBSTR(id,4) as intid'
            )->get()->max('intid');
            $id = 't5_'.((int)$count+1);
            $v = $request->all();
            $v['id'] = $id;
            apexComModel::create($v);

            // return true to ensure creation of new apexcom
            return response()->json([true], 200);
        }

        // update the apexcom with the validated request
        $exists = apexComModel::where('name', $request['name'])->first();
        $validated = $request->all();
        $exists->update($validated);
        // return true to ensure editing of an existing apexcom
        return response()->json([true], 200);
    }
}
