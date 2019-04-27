<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AccountController;
use App\Models\User;

/**
 * @group Adminstration
 *
 * To manage the controls of admins and moderators
 */

class AdministrationController extends Controller
{
  /**
    * deleteApexCom.
    * This Function used to delete an apexcom.
    * only the admin can delete any apexcom.
    *
    * it receives the token of the logged in user.
    * it gets the id of the apexcom to deleted.
    * then it checks that an apexcom with this id exists.
    * if the apexcom doesnot exist it returns an error message ApexCom doesnot exist.
    * it checks that the user who want to delete the apexcom is an admin(type=3).
    * if not it returns an error message unauthorized access.
    * if the user is an admin it deletes the apexcom and return true.
    *
    * @param string token the JWT representation of the admin.
    * @param string  Apex_ID The ID of the ApexCom to be deleted.
    * must be at least 4 chars starts with t5_ .
    * @return boolean deleted , if the apexcom is deleted successfully.
    */

    /**
     * deleteApexCom
     * Deleting the ApexCom by the admin.
     * Success Cases :
     * 1) return true to ensure ApexCom is deleted successfully.
     * failure Cases:
     * 1) Apex fullname (ID) is not found.
     * 2) NoAccessRight the token is not the site admin token id.
     *
     * @bodyParam Apex_ID string required The ID of the ApexCom to be deleted.
     * @bodyParam token JWT required Used to verify the admin ID.
     * @response  500{
     * "error" : "ApexCom doesnot exist"
     * }
     * @response  300{
     * "error" : "Unauthorized access"
     * }
     * @response 200{
     * "value": true
     * }
     */

    public function deleteApexCom(Request $request)
    {
        //get the logged in user id and type
        $account=new AccountController;
        $user=$account->me($request)->getData()->user;
        $type=$user->type;
        $id=$user->id;
        //validate that the input data is correct
        $validator = validator(
            $request->all(),
            ['Apex_ID' => 'required|string']
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }
        //get the id of the apexcom to be deleted
        $apexid= $request['Apex_ID'];
        //check that the apexcom exists
        $apexcom=DB::table('apex_coms')->where('id', '=', $apexid)->get();
        //if the apexcom doesnot exist return an error message ApexCom doesnot exist
        if (!count($apexcom)) {
            return response()->json(['error' => 'ApexCom doesnot exist'], 500);
        }
        //check that the logged in user is an admin
        if ($type==3) {
             DB::table('apex_coms')->where('id', '=', $apexid)->delete();
        } else {  //if the user is not an admin return an error message unauthorized access
            return response()->json(['error' => 'Unauthorized access'], 300);
        }
        //if the apexcom is deleted successfully return true
         return response()->json(['value'=>true], 200);
    }





    /**
     * deleteUser
     * Delete a user from the application by the admin or self-delete (Account deactivation).
     * Success Cases :
     * 1) return true to ensure that the user is deleted successfully.
     * failure Cases:
     * 1) user fullname (ID) is not found.
     * 2) NoAccessRight the token is not the site admin or the same user token id.
     *
     * @bodyParam UserID string required The ID of the user to be deleted.
     * @bodyParam token JWT required Used to verify the admin or the same user ID.
     * @bodyParam passwordConfirmation string required Used to verify the user deactivating his account.
     * @response  500{
     * "error" : "User doesnot exist"
     * }
     * @response  501{
     * "error" : "Wrong password entered"
     * }
     * @response  300{
     * "error" : "UnAuthorized Deletion"
     * }
     * @response 200{
     * "value": true
     * }
     */

    /**
      * deleteUser.
      * This Function used to delete a user by an admin or used for self-delete(Account deactivation).
      *
      * it receives the token of the logged in user.
      * it gets the id of the user to deleted.
      * then it checks that a user exists with the given id.
      * if not it returns an error message user doesnot exist.
      * it gets password confirmation in case of account deactivation.
      * then it gets the hashed password of the user with the given id.
      * it checks that the logged in user is an admin.
      * if the logged user is an admin it deletes the user.
      * if he is not an admin it checks that the logged in user has the same given id.
      * if the ids are different it returns an error message UnAuthorized Deletion.
      * if the ids match it checks that the hashed password is the same as the password confirmation.
      * if the passwords doesnot match it returns an error message Wrong password entered.
      * otherwise it deletes the user (deactivate the account) and returns true.
      *
      * @param string token the JWT representation of the user, admin or moderator.
      * @param string  passwordConfirmation The password of the user to be deleted
      *(entered anything in case of admin deleting user).
      * @param string  UserID The ID of the user to be deleted.
      * must be at least 4 chars starts with t2_ .
      * @return boolean deleted , if the user is deleted successfully.
      */



    public function deleteUser(Request $request)
    {
        //get the logged in user id and type
        $account=new AccountController;
        $user=$account->me($request)->getData()->user;
        $type=$user->type;
        $id=$user->id;
        //validate that the input data is correct
        $validator = validator(
            $request->all(),
            ['UserID' => 'required|string',
             'passwordConfirmation'=>'required|string'
            ]
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }
        //get the id of the user to be deleted
        $userid= $request['UserID'];
         //check that there is a user with the given id
         $usertobedeleted=DB::table('users')->where('id', '=', $userid)->get();
         //if the user doesnot exist return an error message user doesnot exist
        if (!count($usertobedeleted)) {
             return response()->json(['error' => 'User doesnot exist'], 500);
        }
        //get the password confirmation(in case of account deactivation)
        $password=$request['passwordConfirmation'];
        //get the hashed password of the user with the given id
        $dbPassword=DB::table('users')->where('id', '=', $userid)->value('password');

        //check if the logged in user is an admin
        if ($type==3) {
                User::where('id', $userid)->delete();
        } else {
                 // if the user is not an admin check that the logged in user has the same given id
            if ($id==$userid) {
                    //check that the password confirmation matches the user password
                if (Hash::check($password, $dbPassword)) {
                    User::where('id', $userid)->delete();
                } else {  //if password confirmation doesnot match return Wrong password entered
                        return response()->json(['error' => 'Wrong password entered'], 501);
                }
            } else {      //if the user doesnot have the same id return an error message unauthorized deletion
                    return response()->json(['error' => 'UnAuthorized Deletion'], 300);
            }
        }
        //if the user is deleted successfully return true
        return response()->json(['value'=>true], 200);
    }




    /**
     * addModerator
     * Adding (or Deleting) a moderator to ApexCom.
     * Success Cases :
     * 1) return true to ensure that the moderator is added successfully.
     * failure Cases:
     * 1) user fullname (ID) is not found.
     * 2) apex com is not found.
     * 3) NoAccessRight the token is not the site admin token id.
     *
     * @bodyParam ApexComID string required The ID of the ApexCom.
     * @bodyParam token JWT required Used to verify the Admin ID.
     * @bodyParam UserID string required The user ID to be added as a moderator.
     * @response  500{
     * "error" : "Unauthorized access"
     * }
     * @response  403{
     * "error" : "User doesnot exist"
     * }
     * @response  404{
     * "error" : "ApexCom doesnot exist"
     * }
     * @response 200{
     * "value": true
     * }
     */


    /**
      * addModerator.
      * This Function used to add a user as a moderator for an apexcom.
      * only the admin can add moderators to the apexcom.
      *
      * it receives the token of the logged in user.
      * it gets the id of the user to be added as moderator.
      * then it checks that a user exists with the given id.
      * if not it returns an error message user doesnot exist.
      * it gets the id of the apexcom.
      * then it checks that an apexcom exists with the given id.
      * if not it returns an error message apexcom doesnot exist.
      * it checks that the logged in user is an admin.
      * if the logged user is an admin it checks if the user is already a moderator for the given apex com.
      * if the user is already a moderator it deletes the moderation and returns true.
      * if not the user is added as moderator and it returns true.
      *
      * @param string token the JWT representation of the admin.
      * @param string  ApexComID The id of the apexcom adding a moderator to it.
      * must be at least 4 chars starts with t5_ .
      * @param string  UserID The ID of the user to be added as moderator.
      * must be at least 4 chars starts with t2_ .
      * @return boolean moderate , if the user moderation is added or deleted successfully.
      */



    public function addModerator(Request $request)
    {
        //get the logged in user id and type
        $account=new AccountController;
        $user=$account->me($request)->getData()->user;
        $type=$user->type;
        $id=$user->id;
        //validate that the input data is correct
        $validator = validator(
            $request->all(),
            ['UserID' => 'required|string',
             'ApexComID'=>'required|string'
            ]
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }
        //get the id of the user to be added as moderator
        $userid= $request['UserID'];
        //check that there is a user with the given id
        $userexists=DB::table('users')->where('id', '=', $userid)->get();
        //if the user doesnot exist return an error message user doesnot exist
        if (!count($userexists)) {
            return response()->json(['error' => 'User doesnot exist'], 403);
        }
        //get the id of the apexcom
        $apexid=$request['ApexComID'];
        //check that there is an apex com with the given id
        $apex=DB::table('apex_coms')->where('id', '=', $apexid)->get();
       //if the apexcom doesnot exist return an error message apexcom doesnot exist
        if (!count($apex)) {
            return response()->json(['error' => 'ApexCom doesnot exist'], 404);
        }
        //check that the logged in user is an admin
        if ($type==3) {
            //check if the user is already a moderator for the apexcom
            $check=DB::table('moderators')->where([['userID', '=', $userid],['apexID','=',$apexid]])->get();
            //if the user is a moderator remove his moderation
            if (count($check)) {
                DB::table('moderators')->where([
                    ['userID', '=', $userid],
                    ['apexID', '=', $apexid]
                    ])->delete();
            } else {    //if the user is not moderator add him as moderator for the given apexcom
                DB::table('moderators')->insert(
                    ['apexID' => $apexid, 'userID' =>$userid]
                );
            }
        } else {    //if the logged in user is not an admin return an error message Unauthorized access
            return response()->json(['error' => 'Unauthorized access'], 500);
        }
        //returns true if the user moderation is added/deleted successfully
        return response()->json(['value'=>true], 200);
    }
}
