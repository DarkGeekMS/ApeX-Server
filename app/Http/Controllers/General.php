<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apexCom;
use App\vote;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class General extends Controller
{

    /**
     * search
     * Returns a list of lists of ApexComs, posts and profiles that matches the given query.
     * Success Cases :
     * 1) Return the result successfully.
     * failure Cases:
     * 1) No matches found.
     *
     * @bodyParam query string required The query to be searched for.
     */

    public function search()
    {
        return;
    }




    /**
     * sortPostsBy
     * Returns a list of posts in a given ApexComm sorted either by the votes or by the date.
     * Success Cases :
     * 1) Return the result successfully.
     * failure Cases:
     * 1) ApexCom fullname (ID) is not found.
     * 2) The given parameter is out of the specified values, in this case it uses the default values.
     *
     * @bodyParam apexComID string required The ID of the ApexComm that contains the posts.
     * @bodyParam sortingParam string The sorting parameter, takes a value of ['votes', 'date'], Default is 'date'.
     */

    public function sortPostsBy(Request $request)
    {
        $apexCom = apexCom::findOrFail($request->apexComID);
        
        $sortingParam = $request->input('sortingParam', 'date');
        $sortingParam = ($sortingParam === 'date' || $sortingParam === 'votes') ? $sortingParam : 'date';

        if ($sortingParam === 'date') {

            return $apexCom->posts()->orderBy('posted_at', 'desc');

        } elseif ($sortingParam === 'votes') {

            return DB::raw(
                'SELECT * FROM posts JOIN 
                ( (SELECT SUM(dir) AS votes, postID from votes GROUP BY postID) AS votesTable )
                on id = postID ORDER BY votes DESC'
            );

        }
    }


    /**
     * apexNames
     * Returns a list of the names of the existing ApexComms.
     * Success Cases :
     * 1) Return the result successfully.
     * failure Cases:
     * 1) Return empty list if there are no existing ApexComms.
     */

    public function apexNames()
    {
        return;
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

    public function getSubscribers()
    {
        return;
    }
}
