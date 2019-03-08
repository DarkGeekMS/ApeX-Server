<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class General extends Controller
{

    /**
     * Search
     * Returns a list of lists of communities, posts and profiles that matches the given query
    * @bodyParam query string required The query to be searched for.
    * Success Cases :
    * 1) Return the result successfully.
    * failure Cases:
    * 1) No matches found
    */

    public function Search()
    {return;}



      /**
      * SortPostsBy
      * Returns a list of posts in a given ApexComm sorted either by the votes or by the date 
    * @bodyParam ApexCommID string required The ID of the ApexComm that contains the posts.
    * @bodyParam SortingParam string The sorting parameter, takes a value of ['votes', 'date'], Default is 'date'.
    * @bodyParam desc bool To specify wether the sort is descending or ascending, Default is true
    * Success Cases :
    * 1) Return the result successfully.
    * failure Cases:
    * 1) ApexComm fullname (ID) is not found.
    * 2) The given parameter is out of the specified values, in this case it uses the default values
    */

      public function SortPostsBy()
      {return;}



        /**
        * ApexNames
        * Returns a list of the names of the existing ApexComms
    * Success Cases :
    * 1) Return the result successfully.
    * failure Cases:
    * 1) Return empty list if there are no existing ApexComms
    */

        public function ApexNames()
        {return;}


}
