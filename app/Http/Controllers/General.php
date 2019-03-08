<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class General extends Controller
{

    /**
     * Search
     * Returns a list of lists of communities, posts and profiles that matches the given query
  * @bodyParam query string required The query to be searched for.
  */

    public function Search()
    {return;}



      /**
       * SortPostsBy
       * Returns a list of posts in a given ApexComm sorted either by the votes or by the date 
    * @bodyParam ApexCommID string required The ID of the ApexComm that contains the posts.
    * @bodyParam SortingParam string required The sorting parameter, takes a value of ['votes', 'date'].
    * @bodyParam desc bool To specify wether the sort is descending or ascending, Default is true
    */

      public function SortPostsBy()
      {return;}



        /**
         * ApexNames
         * Returns a list of the names of the existing ApexComms
      */

        public function ApexNames()
        {return;}


}
