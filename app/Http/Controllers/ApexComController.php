<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AccountController;
use Carbon\Carbon;
use App\Models\ApexCom as apexComModel;
use App\Models\Subscriber;
use App\Models\ApexBlock;
use App\Models\User;
use App\Models\Moderator;
use App\Models\Post;

/**
 * @group ApexCom
 *
 * Controls the ApexCom info , posts and admin.
 */

class ApexComController extends Controller
{
    /**
     * Guestabout
     * to get data about an ApexCom (moderators , name, contributors , rules , description and subscribers count).
     * Success Cases :
     * 1) return the information about the ApexCom.
     * failure Cases:
     * 2) ApexCom fullname (ApexCom_id) is not found.
     *
     * @response 404 {"error":"ApexCom is not found."}
     * @response 200 {"contributers_count":2,"moderators":[{"userID":"t2_3"}],"subscribers_count":0,"name":"New dawn","description":"The name says it all.","rules":"NO RULES"}
     *
     * @bodyParam ApexCom_ID string required The fullname of the community.
     */
    public function guestAbout(Request $request)
    {
        $apex_id = $request['ApexCom_ID'];

        // checking if the apexCom exists.
        $exists = apexComModel::where('id', $apex_id)->count();

        // return an error message if the id (fullname) of the apexcom was not found.
        if (!$exists) {
            return response()->json(['error' => 'ApexCom is not found.'], 404);
        }

        // getting about info (contributers_count,moderators,subscribers_count,name,description,rules)

        $contributers_count = DB::table('posts')->where('apex_id', $apex_id)
            ->select('posted_by')->distinct('posted_by')->get()->count();

        $moderators = Moderator::where('apexID', $apex_id)->get('userID');

        $subscribers_count = Subscriber::where('apexID', $apex_id)->count();

        $apexCom = ApexComModel::find($apex_id);

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
     * About
     * to get data about an ApexCom (moderators , name, contributors , rules , description and subscribers count) with a logged in user.
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
        $account = new AccountController();
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
        $blocked = ApexBlock::where([['ApexID', '=',$apex_id],['blockedID', '=',$user_id] ])->count();

        // return an error for if the user was blocked from the apexcom.
        if ($blocked != 0) {
            return response()->json(['error' => 'You are blocked from this Apexcom'], 400);
        }

        // getting about info (contributers_count,moderators,subscribers_count,name,description,rules)

        $contributers_count = DB::table('posts')->where('apex_id', $apex_id)
            ->select('posted_by')->distinct('posted_by')->get()->count();

        $moderators = Moderator::where('apexID', $apex_id)->get('userID');

        $subscribers_count = Subscriber::where('apexID', $apex_id)->count();

        $apexCom = ApexComModel::find($apex_id);

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
     * Post
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
     * @bodyParam title string required The title the post.
     * @bodyParam body string The text body of the post.
     * @bodyParam img_name string The attached image to the post.
     * @bodyParam video_url string The url to attached video to the post.
     * @bodyParam isLocked bool To allow or disallow comments on the posted post.
     * @bodyParam token JWT required Verifying user ID.
     */

    public function submitPost(Request $request)
    {
        $account = new AccountController();
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
        $blocked = ApexBlock::where(
            [['ApexID', '=',$apex_id],['blockedID', '=',$user_id]]
        )->count();

        // return an error for if the user was blocked from the apexcom.
        if ($blocked != 0) {
            return response()->json(['error' => 'You are blocked from this Apexcom'], 400);
        }
        // validate data of the request.
        $validated = Validator::make(
            $request->all(),
            [
                'title' => 'required|min:3',
                'body' => 'required_without_all:video_url,img_name|',
                'video_url' => 'required_without_all:body,img_name',
                'img_name' => 'required_without_all:body,video_url|image'
            ]
        );

        //Returning the validation errors in case of invalid requestdata
        if ($validated->fails()) {
            return response()->json($validated->errors(), 400);
        }
        $r = $request->all();
        if (array_key_exists('video_url', $r) && $r['video_url'] != "") {
            $url = Validator::make(
                $request->all(),
                [
                    'video_url' => 'url',
                ]
            );
            if ($url->fails()) {
                return response()->json($url->errors(), 400);
            }
            $parsed = parse_url($r['video_url']);
            if (substr($parsed['query'], 0, 2) != "v=" || $parsed['scheme'] != 'https' || $parsed['host'] != 'www.youtube.com' || $parsed['path'] != '/watch') {
                return response()->json(['error' => 'the url is not a youtube video'], 400);
            }
        }
        $count = Post::selectRaw('CONVERT( SUBSTR(id, 4), INT ) AS intID')->get()->max('intID');
        $id = 't3_'.((int)$count+1);
        $v['id'] = $id;
        $v['posted_by'] = $user_id;
        $v['apex_id'] = $apex_id;
        $v['title'] = $r['title'];
        if (array_key_exists('body', $r) && $r['body'] != "")
            $v['content'] = $r['body'];
        if (array_key_exists('img_name', $r) && $r['img_name'] != "")
            $v['img'] = $r['img_name'];
        if (array_key_exists('video_url', $r) && $r['video_url'] != "")
            $v['videolink'] = $r['video_url'];
        if (array_key_exists('isLocked', $r) && $r['isLocked'] != "")
            $v['locked'] = $r['isLocked'];
        Post::create($v);
        return response()->json('Created', 200);
    }





    /**
     * Subscribe
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
        $account = new AccountController();
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
        $blocked = ApexBlock::where(
            [['ApexID', '=',$apex_id],['blockedID', '=',$user_id]]
        )->count();

        // return an error for if the user was blocked from the apexcom.
        if ($blocked != 0) {
            return response()->json(['error' => 'You are blocked from this Apexcom'], 400);
        }

        // get if the user was previously subscribing the apexcom.
        $unsubscribe = Subscriber::where(
            [['apexID', '=',$apex_id],['userID', '=',$user_id] ]
        )->count();

        // unsubscribe if previously subscribed and return true to ensure the success of unsubscribe.
        if ($unsubscribe) {
            Subscriber::where([['apexID', '=',$apex_id],['userID', '=',$user_id] ])->delete();

            return response()->json('Unsubscribed', 200);
        }

        // if not previously subscribed then subscribe and store it in the database.
        Subscriber::create(
            [
                'apexID' => $apex_id ,
                'userID' => $user_id
            ]
        );

        // return true to ensure the success of subscription.
        return response()->json('Subscribed', 200);
    }



    /**
     * SiteAdmin
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
        $account = new AccountController();
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
            $count = apexComModel::selectRaw('CONVERT( SUBSTR(id, 4), INT ) AS intID')->get()->max('intID');
            $id = 't5_'.((int)$count+1);
            $v = $request->all();
            $v['id'] = $id;
            apexComModel::create($v);

            // return true to ensure creation of new apexcom
            return response()->json('Created', 200);
        }

        // update the apexcom with the validated request
        $exists = apexComModel::where('name', $request['name'])->first();
        $validated = $request->all();
        $exists->update($validated);
        // return true to ensure editing of an existing apexcom
        return response()->json('Updated', 200);
    }
}
