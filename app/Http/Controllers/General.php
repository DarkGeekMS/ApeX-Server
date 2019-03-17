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
        try{
            $validator = validator(
                $request->all(), ['query' => 'required|string|min:3']
            );
    
            if ($validator->fails()) {
                return response($validator->errors(), 400);
            }
    
            $query = $request->input('query');
            $apexComs = apexCom::where('name', 'like', '%'.$query.'%')->get();
            $users = User::where('fullname', 'like', '%'.$query.'%')
                ->orWhere('username', 'like', '%'.$query.'%')->get();
            $posts = post::where('content', 'like', '%'.$query.'%')->get();
                //->orWhere('title', 'like', '%'.$query.'%');
            return compact('posts', 'apexComs', 'users');

        }catch(\Exception $e){
            return response(['error'=>'server-side error'], 500);
        }

    }




    /**
     * sortPostsBy
     * Returns a list of posts in a given ApexComm sorted either by the votes or by the date when they were created
     * or by the comments count.
     * Success Cases :
     * 1) Return the result successfully.
     * failure Cases:
     * 1) ApexCom fullname (ID) is not found.
     * 2) The given parameter is out of the specified values, in this case it uses the default values.
     * 3) Return response code 500 if there is a server-side error
     *
     * @bodyParam apexComID string required The ID of the ApexComm that contains the posts.
     * @bodyParam sortingParam string The sorting parameter, takes a value of ['votes', 'date', 'comments'], Default is 'date'.
     */

    public function sortPostsBy(Request $request)
    {
        $validator = validator(
            $request->only('apexComID'), ['apexComID' => 'required|string']
        );

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $apexCom = apexCom::findOrFail($request->apexComID);
        
        $sortingParam = $request->input('sortingParam', 'date');
        if (!in_array($sortingParam, ['date', 'votes', 'comments'])) {
            $sortingParam = 'date';
        }

        try{
            if ($sortingParam === 'date') {
    
                $posts = $apexCom->posts()->orderBy('created_at', 'desc')->get();
                return compact('posts');
    
            } elseif ($sortingParam === 'votes') {
    
                $votesTable = vote::select('postID', DB::raw('SUM(dir) as votes'))->groupBy('postID');
    
                $posts = post::joinSub(
                    $votesTable, 'votes_table', function ($join) {
                        $join->on('posts.id', '=', 'votes_table.postID');
                    }
                )->where('apex_id', $apexCom->id)->orderBy('votes', 'desc')->get();
                    
                return compact('posts');
            } elseif ($sortingParam === 'comments') {

                $commentsTable = comment::select('root', DB::raw('count(*) as comments_num'))->groupBy('root');

                $posts = post::joinSub(
                    $commentsTable, 'comments_table', function ($join) {
                        $join->on('posts.id', '=', 'comments_table.root');
                    }
                )->where('apex_id', $apexCom->id)->orderBy('comments_num', 'desc')->get();

                return compact('posts');
            }
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
        try{
            return apexCom::select('id', 'name')->get();
        }catch(\Exception $e){
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
        $user_id = $account->me($request);

        if (!$user_id) {
            return response()->json(['error' => 'invalid user'], 404);
        }

        $apex_id = $request['ApexCommID'];

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

        // get the subscribers' for the apexcom user IDs.
        $subscribers = subscriber::where('apexID',$apex_id)->get('userID');

        // return the subscribers user IDs.
        return response()->json(compact('subscribers'));
    }
}
