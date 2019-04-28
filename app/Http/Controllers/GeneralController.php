<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Models\Subscriber;
use App\Models\ApexCom;
use App\Models\ApexBlock;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Block;
use App\Models\Vote;
use App\Models\ReportPost;
use App\Models\Hidden;
use Illuminate\Http\Response;

class GeneralController extends Controller
{

    /**
     * Search for ApexComs, Users and posts that matches the given query.
     * Validate the input by checking that the query is string and 
     * at least 3 characters.
     * Get the ApexComs that have name or description that matche the query.
     * Get the Users that have fullname or username thath matche the query.
     * Get the Posts that have title or content that match the query.
     * 
     * @param Request $request
     * 
     * @return Response
     */
    /**
     * Guest Search
     * Returns a json contains posts, apexComs and users that match the given query.
     * Use this request only if the user is a guest and not authorized
     *
     * ###Success Cases :
     * 1. The `query` is valid, return the results successfullly (status code 200)
     *
     * ###Failure Cases:
     * 1. The `query` is invalid, return message about the error (status code 400)
     * 2. There is server-side error (status code 500)
     *
     * @responseFile responses\validSearch.json
     * @responseFile 400 responses\invalidQuery.json
     * @responseFile 400 responses\missingQueryParam.json
     *
     * @queryParam query required The query to be searched for (at least 3 characters). Example: lorem
     */
    public function guestSearch(Request $request)
    {
        $validator = validator(
            $request->all(),
            ['query' => 'required|string|min:3']
        );

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $query = $request->input('query');
        try {
            $apexComs = ApexCom::where('name', 'like', '%'.$query.'%')
                ->orWhere('description', 'like', '%'.$query.'%')
                ->select('id', 'name', 'avatar', 'description')
                ->withCount('subscribers')->get();

            $users = User::where('fullname', 'like', '%'.$query.'%')
                ->orWhere('username', 'like', '%'.$query.'%')
                ->select('id', 'username', 'avatar', 'karma')->get();
            $posts = Post::where('title', 'like', '%'.$query.'%')
                ->orWhere('content', 'like', '%'.$query.'%')->get();
            return compact('posts', 'apexComs', 'users');
        } catch (\Exception $e) {
            return response(['error'=>'server-side error'], 500);
        }
    }

    /**
     * Just a helper fuction to remove posts from blocked users,
     * posts that are hidden or reported by the current user
     * and posts from apexComs that the current user is blocked from
     * and remove blocked users and apexComs from the result
     * it also adds the current user votes on the posts
     * and if he had saved the post previously, if the bool `subscribed` is true,
     * limit the posts to be from only apexComs that the user is subscribed in
     * it also adds the current user subscription of the apexComs
     *
     * @param Collection $result the collection that contains posts
     * @param JWT        $token  to get the userID
     *
     * @return Response
     */
    public function filterResult(Collection $result, $token, bool $subscribed = false)
    {
        $account = new AccountController();
        $meResponse = $account->me(new Request(compact('token')));

        $userID = $meResponse->getData()->user->id;

        try {
            $blockList = Block::where('blockerID', $userID)->pluck('blockedID');
            $blockList = $blockList->concat(
                Block::where('blockedID', $userID)->pluck('blockerID')
            );

            //remove the posts that have been posted by a user in the blocklist
            $result['posts'] = $result['posts']
                ->whereNotIn('posted_by', $blockList)->flatten();

            //remove the posts that are hidden or reported by the current user
            $postsList = ReportPost::where(compact('userID'))->pluck('postID');
            $postsList = $postsList
                ->concat(Hidden::where(compact('userID'))->pluck('postID'));
            $result['posts'] = $result['posts']
                ->whereNotIn('id', $postsList)->flatten();

            //create a list of apexComs that the current user is blocked from
            $apexList = ApexBlock::where('blockedID', $userID)->pluck('ApexID');
            //remove them from the result
            $result['posts'] = $result['posts']
                ->whereNotIn('apex_id', $apexList)->flatten();
                
            //add the current user vote on the posts and if he had saved it
            $result['posts']->each(
                function ($post) use ($userID) {
                    $post['current_user_vote'] = $post->userVote($userID);
                    $post['current_user_saved_post'] = $post->isSavedBy($userID);
                }
            );

            //check if the posts should be from the apexComs that the user is
            //subscribed in and filter the result according to that
            if ($subscribed) {
                $subscribedList = Subscriber::where(compact('userID'))
                    ->pluck('apexID');
                $result['posts'] = $result['posts']
                    ->whereIn('apex_id', $subscribedList)->flatten();
            }

            //remove blocked users from the result
            if ($result->has('users')) {
                $result['users'] = $result['users']
                    ->whereNotIn('id', $blockList)->flatten();
            }


            if ($result->has('apexComs')) {

                $result['apexComs'] = $result['apexComs']
                    ->whereNotIn('id', $apexList)->flatten();

                //add the current user subscription to the apexCom
                $result['apexComs']->each(
                    function ($apexCom) use ($userID) {
                        $apexCom['current_user_subscribed']
                            = $apexCom->isSubscribedBy($userID);
                    }
                );
            }
            return $result;
        } catch (\Exception $e) {
            return response(['error'=>'server-side error'], 500);
        }
    }

    /**
     * Get the result from `guestSearch` request, then filter the result
     * using `filterResult` function.
     * 
     * @param Request $request
     * 
     * @return Response
     */
    /**
     * User Search
     * Just like [Guest Search](#guest-search) except that
     * it does't return the posts between blocked users,
     * posts that are hidden or reported by the current user
     * and posts from apexComs that the current user is blocked from,
     * it also doesn't return blocked users
     * and the apexComs that the user is blocked from,
     * it also adds the current user vote on the posts and if he had saved them
     * and adds the current user subscription of the apexComs.
     * Use this request only if the user is logged in and authorized.
     *
     * ###Success Cases :
     * 1. The `query` is valid, return the results successfullly (status code 200)
     *
     * ###Failure Cases:
     * 1. The `query` is invalid, return message about the error (status code 400)
     * 2. The `token` is invalid, return a message about the error (status code 400)
     * 3. There is server-side error (status code 500)
     *
     * @authenticated
     *
     * @responseFile responses\validUserSearch.json
     * @responseFile 400 responses\missingQueryParam.json
     * @responseFile 400 responses\invalidQuery.json
     * @responseFile 400 responses\notAuthorized.json
     *
     * @bodyParam query string required The query to be searched for (at least 3 characters). Example: lorem
     * @bodyParam token JWT required Used to verify the user. Example: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo
     */

    public function userSearch(Request $request)
    {
        $result = $this->guestSearch($request);
        if (!array_key_exists('posts', $result)) {
            return $result;
        }
        return $this->filterResult(collect($result), $request['token']);
    }

    /**
     * Get the posts sorted by date, votes or comments.
     * Validate the input by checking that the given apexComID exists,
     * and the sortingParam is one of [`votes`, `date`, `comments`], if it's not,
     * it uses `date` as a default value.
     * If the apexComID is not found it return an error,
     * else it uses that id to get the posts in that apexCom if there is no
     * `subscribedApexCom` parameter in the request (not called from userSortPosts),
     * then it return the posts sorted by the given sortingParam.
     * 
     * @param Request $request
     * 
     * @return Response
     */
    /**
     * Guest Sort Posts
     * Returns a list of posts in a given ApexCom
     * sorted either by the votes or by the date when they were created
     * or by the number of comments.
     * - When `apexComID` is missing or equals null,
     *     it returns all the posts in all apexComs.
     * - When `sortingParam` is missing or equals null, it uses the default value
     *
     * Use this request only if the user is a guest and not authorized
     *
     * ###Success Cases :
     * 1. Return the result successfully (status code 200).
     *
     * ###Failure Cases:
     * 1. ApexCom is not found (status code 404).
     * 2. There is a server-side error (status code 500).
     *
     * @responseFile responses\validSort.json
     * @responseFile 404 responses\apexComNotFound.json
     *
     * @queryParam apexComID The ID of the ApexComm that contains the posts, default is null. Example: t5_1
     * @queryParam sortingParam The sorting parameter, takes a value of [`votes`, `date`, `comments`], default is `date`. Example: votes
     */

    public function guestSortPostsBy(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'apexComID' => 'string|nullable',
                'sortingParam' => 'string|nullable'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $sortingParam = $request->input('sortingParam', 'date');
        if (!in_array($sortingParam, ['date', 'votes', 'comments'])) {
            $sortingParam = 'date';
        }
        $apexComID = $request->input('apexComID', null);
        $posts = Post::query();

        if ((!$request->has('subscribedApexCom') || $request['subscribedApexCom'] == false) && $apexComID !== null) {
            if (ApexCom::where('id', $apexComID)->exists()) {
                $posts = $posts->where('apex_id', $apexComID);
            } else {
                return response(['error' => 'ApexCom is not found.'], 404);
            }
        }

        try {
            if ($sortingParam === 'date') {
                $posts = $posts->orderBy('created_at', 'desc')->get();
            } elseif ($sortingParam === 'votes') {
                $posts = $posts->get()->sortByDesc('votes')->flatten();
            } elseif ($sortingParam === 'comments') {
                $posts = $posts->get()->sortByDesc('comments_count')->flatten();
            }
            return compact('posts', 'sortingParam');
        } catch (\Exception $e) {
            return response(['error'=>'server-side error'], 500);
        }
    }

    /**
     * Get the result from `guestSortPostsBy`,
     * check that there are ApexComs that the user is subscribed in,
     * or return an error message,
     * then return the filtered results using `filterResult` function.
     * 
     * @param Request $request
     * 
     * @return Response
     */
    /**
     * User Sort Posts
     * Just like [Guest Sort Posts](#guest-sort-posts), except that
     * it does't return the posts between blocked users
     * and posts that are hidden or reported by the current user
     * and posts from apexComs that the current user is blocked from,
     * it also adds to every post the current user vote and if he had saved the post.
     * If the boolean `subscribedApexComs` is true, then it ignores the `apexComID`
     * and return only posts in the apexComs that the user is subscribed in.
     * Use this request only if the user is logged in and authorized.
     *
     * ###Success Cases :
     * 1. Return the result successfully (status code 200).
     *
     * ###Failure Cases:
     * 1. ApexCom is not found (status code 404).
     * 2. The user is not subscribed in any apexCom. (status code 400)
     * 3. The `token` is invalid, return a message about the error (status code 400)
     * 4. There is a server-side error (status code 500).
     *
     * @authenticated
     *
     * @responseFile responses\validUserSort.json
     * @responseFile 404 responses\apexComNotFound.json
     * @responseFile 400 responses\notAuthorized.json
     * @responseFile 400 responses\userNotSubscribedInAnyApexComs.json
     * 
     * @bodyParam apexComID string The ID of the ApexComm that contains the posts, default is null. Example: t5_1
     * @bodyParam subscribedApexCom bool If true return only the posts in ApexComs that the user is subscribed in, default is false. Example: false
     * @bodyParam sortingParam string The sorting parameter, takes a value of [`votes`, `date`, `comments`], default is `date`. Example: votes
     * @bodyParam token JWT required Used to verify the user. Example: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo
     */
    public function userSortPostsBy(Request $request)
    {
        $validator = validator(
            $request->only('subscribedApexCom'),
            ['subscribedApexCom' => 'bool']
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $result = $this->guestSortPostsBy($request);
        if (!array_key_exists('posts', $result)) {
            return $result;
        }

        $account = new AccountController();
        $userID = $account->me($request)->getData()->user->id;
        $subscribed = $request->input('subscribedApexCom', false);
        if ($subscribed && !Subscriber::query()->where(compact('userID'))->exists()) {
            return response()->json(
                ['error' => 'The user is not subscribed in any ApexCom'], 400
            );
        }
        return $this->filterResult(collect($result), $request['token'], $subscribed);
    }

    /**
     * Get all the existing ApexComs and return their id and name 
     * 
     * @return Response
     */
    /**
     * Apex Names
     * Returns a list of the names and ids of all of the existing ApexComs.
     *
     * ###Success Cases :
     * 1. Return the result successfully (status code 200).
     *
     * ###Failure Cases:
     * 1. There is server-side error (status code 500).
     */
    public function apexNames()
    {
        try {
            $Anames = ApexCom::select('id', 'name')->get();
            return response()->json([$Anames], 200);
        } catch (\Exception $e) {
            return response(['error'=>'server-side error'], 500);
        }
    }


    /**
     * Get Subscribers
     * Returns a list of the users subscribed to a certain ApexCom to an authorized user.
     * It first checks the apexcom id, if it wasnot found an error is returned.
     * Then a check that the authorized user is not blocked from the apexcom, if he was blocked a logical error is returned.
     * Then, it gets the username and id of the subscribers and returns them.
     *
     * ###Success Cases :
     * 1) Return the result successfully.
     * ###failure Cases:
     * 1) Return empty list if there are no subscribers.
     * 2) ApexComm Fullname (ID) is not found.
     * 3) User blocked from this apexcom.
     *
     * @authenticated
     *
     * @response 400 {"token_error":"The token could not be parsed from the request"}
     * @response 404 {"error":"ApexCom is not found."}
     * @response 400 {"error":"You are blocked from this Apexcom"}
     * @response 200 {
     * "subscribers": [
     *   {
     *       "id": "t2_1017",
     *       "fullname": null,
     *       "email": "ms16@gmail.com",
     *       "username": "ms16",
     *       "avatar": "storage/avatars/users/default.png",
     *       "karma": 1,
     *       "notification": 1,
     *       "type": 3,
     *       "created_at": "2019-03-23 21:34:24",
     *       "updated_at": "2019-03-23 21:34:24",
     *       "userID": "t2_1017"
     *   }
     *  ]
     * }
     *
     * @bodyParam ApexCommID string required The ID of the ApexCom that contains the subscribers.
     * @bodyParam token JWT required Verifying user ID.
     */

    public function getSubscribers(Request $request)
    {
        $account = new AccountController();

        // getting the user_id and user_type related to the token in the request and validate.

        $User = $account->me($request)->getData()->user;
        $user_id = $User->id;

        $apex_id = $request['ApexCommID'];

        // checking if the apexCom exists.
        $exists = ApexCom::where('id', $apex_id)->count();

        // return an error message if the id (fullname) of the apexcom was not found.
        if (!$exists) {
            return response()->json(['error' => 'ApexCom is not found.'], 404);
        }

        // check if the validated user was blocked from the apexcom.
        $blocked = ApexBlock::where([['ApexID', '=',$apex_id],['blockedID', '=',$user_id]])->count();

        // return an error for if the user was blocked from the apexcom.
        if ($blocked != 0) {
            return response()->json(['error' => 'You are blocked from this Apexcom'], 400);
        }

        // get the subscribers' for the apexcom user IDs.
        $subscribers_id = Subscriber::select('userID')->where('apexID', '=', $apex_id);
        $subscribers = User::select('id', 'username')->joinSub(
            $subscribers_id,
            'apex_subscribers',
            function ($join) {
                $join->on('id', '=', 'userID');
            }
        )->get();

        // return the subscribers user IDs.
        return response()->json(compact('subscribers'));
    }

    /**
     * GuestGetSubscribers
     * Returns a list of the users subscribed to a certain ApexCom to a guest user.
     * It first checks the apexcom id, if it was not found an error is returned.
     * it gets the username and id of the subscribers and returns them.
     *
     * ###Success Cases :
     * 1) Return the result successfully.
     * ###failure Cases:
     * 2) ApexComm Fullname (ID) is not found.
     *
     * @response 404 {"error":"ApexCom is not found."}
     * @response 200 {
     * "subscribers": [
     *   {
     *       "id": "t2_1017",
     *       "fullname": null,
     *       "email": "ms16@gmail.com",
     *       "username": "ms16",
     *       "avatar": "storage/avatars/users/default.png",
     *       "karma": 1,
     *       "notification": 1,
     *       "type": 3,
     *       "created_at": "2019-03-23 21:34:24",
     *       "updated_at": "2019-03-23 21:34:24",
     *       "userID": "t2_1017"
     *   }
     *  ]
     * }
     *
     * @bodyParam ApexCommID string required The ID of the ApexComm that contains the subscribers.
     */

    public function guestGetSubscribers(Request $request)
    {
        $apex_id = $request['ApexCommID'];

        // checking if the apexCom exists.
        $exists = ApexCom::where('id', $apex_id)->count();

        // return an error message if the id (fullname) of the apexcom was not found.
        if (!$exists) {
            return response()->json(['error' => 'ApexCom is not found.'], 404);
        }

        // get the subscribers' for the apexcom user IDs.
        $subscribers_id = Subscriber::select('userID')->where('apexID', '=', $apex_id);
        $subscribers = User::select('id', 'username')->joinSub(
            $subscribers_id,
            'apex_subscribers',
            function ($join) {
                $join->on('id', '=', 'userID');
            }
        )->get();

        // return the subscribers user IDs.
        return response()->json(compact('subscribers'));
    }
}
