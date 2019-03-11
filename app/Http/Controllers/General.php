<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * 1) ApexComm fullname (ID) is not found.
     * 2) The given parameter is out of the specified values, in this case it uses the default values.
     *
     * @bodyParam ApexCommID string required The ID of the ApexComm that contains the posts.
     * @bodyParam SortingParam string The sorting parameter, takes a value of ['votes', 'date'], Default is 'date'.
     */

    public function sortPostsBy()
    {
        return;
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
