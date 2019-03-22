<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vote;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\subscriber;
use App\apexCom;
use App\apexBlock;
use App\User;
use App\Http\Controllers\Account;
use App\post;
use App\comment;

class General extends Controller
{

    /**
     * search
     * Returns a json contains of posts, ApexComs and users that matches the given query.
     * Success Cases :
     * 1) Return the result successfully.
     * failure Cases:
     * 1) No matches found.
     * 2) Return response code 500 if there is a server-side error
     *
     * @bodyParam query string required The query to be searched for.
     */

    public function search(Request $request)
    {
        try {
            $validator = validator(
                $request->all(),
                ['query' => 'required|string|min:3']
            );

            if ($validator->fails()) {
                return response($validator->errors(), 400);
            }

            $query = $request->input('query');
            $apexComs = apexCom::where('name', 'like', '%'.$query.'%')
                ->orWhere('description', 'like', '%'.$query.'%')->get();
            $users = User::where('fullname', 'like', '%'.$query.'%')
                ->orWhere('username', 'like', '%'.$query.'%')->get();
            $posts = post::where('title', 'like', '%'.$query.'%')
                ->orWhere('content', 'like', '%'.$query.'%')->get();
            return compact('posts', 'apexComs', 'users');
        } catch (\Exception $e) {
            return response(['error'=>'server-side error'], 500);
        }
    }




    /**
     * sortPostsBy
     * Returns a list of posts in a given ApexComm
     * sorted either by the votes or by the date when they were created
     * or by the comments count. When apexComID is not specified or equals null,
     * it returns all the posts in all apexComs
     * Success Cases :
     * 1) Return the result successfully.
     * failure Cases:
     * 1) ApexCom fullname (ID) is not found.
     * 2) The given parameter is out of the specified values, in this case it uses the default values.
     * 3) Return response code 500 if there is a server-side error
     *
     * @bodyParam apexComID string The ID of the ApexComm that contains the posts, default is null.
     * @bodyParam sortingParam string The sorting parameter, takes a value of ['votes', 'date', 'comments'], Default is 'date'.
     */

    public function sortPostsBy(Request $request)
    {
        $validator = validator(
            $request->all(), ['apexComID' => 'string|nullable', 'sortingParam' => 'string']
        );

        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }

        $sortingParam = $request->input('sortingParam', 'date');
        if (!in_array($sortingParam, ['date', 'votes', 'comments'])) {
            $sortingParam = 'date';
        }
        $apexComID = $request->input('apexComID', null);
        $posts = post::query();

        if ($apexComID !== null) {
            apexCom::findOrFail($apexComID); //raises an error if it's not found
            $posts = $posts->where('apex_id', $apexComID);
        }
        $votesTable = vote::select('postID', DB::raw('CAST(SUM(dir) AS int) AS votes'))->groupBy('postID');
        $commentsTable = comment::select('root', DB::raw('count(*) AS comments_num'))->groupBy('root');

        $posts = $posts->leftJoinSub(
            $votesTable, 'votes_table', function ($join) {
                $join->on('posts.id', '=', 'votes_table.postID');
            }
        );

        $posts = $posts->leftJoinSub(
            $commentsTable, 'comments_table', function ($join) {
                $join->on('posts.id', '=', 'comments_table.root');
            }
        );

        $posts = $posts->select(
            'posts.*',
            DB::raw('COALESCE(votes, 0) as votes'),
            DB::raw('COALESCE(comments_num, 0) as comments_num')
        );

        try {
            if ($sortingParam === 'date') {
                $posts = $posts->orderBy('created_at', 'desc')->get();
            } elseif ($sortingParam === 'votes') {
                $posts = $posts->orderBy('votes', 'desc')->get();
            } elseif ($sortingParam === 'comments') {
                $posts = $posts->orderBy('comments_num', 'desc')->get();
            }
            return compact('posts', 'sortingParam');
        } catch(\Exception $e) {
            return response(['error'=>'server-side error'], 500);
        }
    }


    /**
     * apexNames
     * Returns a list of the names and ids of all of the existing ApexComms.
     * Success Cases :
     * 1) Return the result successfully.
     * failure Cases:
     * 1) Return response code 500 if there is a server-side error.
     */

    public function apexNames()
    {
        try {
            $Anames = apexCom::select('id', 'name')->get();
            return response()->json([$Anames], 200);
        } catch (\Exception $e) {
            return response(['error'=>'server-side error'], 500);
        }
    }


    /**
     * getSubscribers
     * Returns a list of the users subscribed to a certain ApexComm.
     * Success Cases :
     * 1) Return the result successfully.
     * failure Cases:
     * 1) Return empty list if there are no subscribers.
     * 2) ApexComm Fullname (ID) is not found.
     *
     * @bodyParam ApexCommID string required The ID of the ApexComm that contains the subscribers.
     * @bodyParam _token string required Verifying user ID.
     */

    public function getSubscribers(Request $request)
    {
        $account = new Account();

        // getting the user_id related to the token in the request and validate.
        $user_id = $account->me($request)->getData()->user->id;

        // checking if the user exists.
        $exists = User::where('id', $user_id)->count();

        // return a message error if not existing
        if (!$exists) {
            return response()->json(['error' => 'invalid user'], 404);
        }

        $apex_id = $request['ApexCommID'];

        // checking if the apexCom exists.
        $exists = apexCom::where('id', $apex_id)->count();

        // return an error message if the id (fullname) of the apexcom was not found.
        if (!$exists) {
            return response()->json(['error' => 'ApexCom is not found.'], 404);
        }

        // check if the validated user was blocked from the apexcom.
        $blocked = apexBlock::where([['ApexID', '=',$apex_id],['blockedID', '=',$user_id]])->count();

        // return an error for if the user was blocked from the apexcom.
        if ($blocked != 0) {
            return response()->json(['error' => 'You are blocked from this Apexcom'], 400);
        }

        // get the subscribers' for the apexcom user IDs.
        $subscribers_id = subscriber::select('userID')->where('apexID', '=', $apex_id);
        $subscribers = User::joinSub(
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
