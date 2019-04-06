<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\AccountController;

/**
 * @group Adminstration
 *
 * To manage the controls of admins and moderators
 */

class AdministrationController extends Controller
{

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
     */

    public function deleteApexCom(Request $request)
    {
        $account=new AccountController;
        $user=$account->me($request)->getData()->user;
        $type=$user->type;
        $id=$user->id;

        $validator = validator(
            $request->all(),
            ['Apex_ID' => 'required|string']
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }

        $apexid= $request['Apex_ID'];
        $apexcom=DB::table('apex_coms')->where('id', '=', $apexid)->get();
        //to check for admin
        if ($type==3) {
            //to check that the apexcom exists
            if (count($apexcom)) {
                DB::table('apex_coms')->where('id', '=', $apexid)->delete();
            } else {
                return response()->json(['error' => 'ApexCom doesnot exist'], 500);
            }
        } else {
            return response()->json(['error' => 'Unauthorized access'], 300);
        }
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
     */

    public function deleteUser(Request $request)
    {
        $account=new AccountController;
        $user=$account->me($request)->getData()->user;
        $type=$user->type;
        $id=$user->id;

        $validator = validator(
            $request->all(),
            ['UserID' => 'required|string']
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }

        $userid= $request['UserID'];
        $usertobedeleted=DB::table('users')->where('id', '=', $userid)->get();
        //to check for admin
        if ($type==3) {
             //to check that the user exists
            if (count($usertobedeleted)) {
                DB::table('users')->where('id', '=', $userid)->delete();
            } else {
                return response()->json(['error' => 'User doesnot exist'], 500);
            }
        } elseif ($type==1 || $type==2) {            //to check for user or moderator
            //to check that the user exists and has the same id
            if (count($usertobedeleted)) {
                if ($id==$userid) {
                    DB::table('users')->where('id', '=', $userid)->delete();
                } else {
                    return response()->json(['error' => 'UnAuthorized Deletion'], 300);
                }
            } else {
                return response()->json(['error' => 'User doesnot exist'], 500);
            }
        }
        return response()->json(['value'=>true], 200);
    }




    /**
     * addModerator
     * Adding (or Deleting) a moderator to ApexCom.
     * Success Cases :
     * 1) return true to ensure that the moderator is added successfully.
     * failure Cases:
     * 1) user fullname (ID) is not found.
     * 2) NoAccessRight the token is not the site admin token id.
     *
     * @bodyParam ApexComID string required The ID of the ApexCom.
     * @bodyParam token JWT required Used to verify the Admin ID.
     * @bodyParam UserID string required The user ID to be added as a moderator.
     */

    public function addModerator(Request $request)
    {
        $account=new AccountController;
        $user=$account->me($request)->getData()->user;
        $type=$user->type;
        $id=$user->id;

        $validator = validator(
            $request->all(),
            ['UserID' => 'required|string',
             'ApexComID'=>'required|string'
            ]
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }

        $userid= $request['UserID'];
        $apexid=$request['ApexComID'];

        $apex=DB::table('apex_coms')->where('id', '=', $apexid)->get();
        $userexists=DB::table('users')->where('id', '=', $userid)->get();
        $check=DB::table('moderators')->where([['userID', '=', $userid],['apexID','=',$apexid]])->get();
        //to check for admin
        if ($type==3) {
            //to check that the apexcom exists
            if (count($apex)) {
                //to check that the user exists
                if (count($userexists)) {
                  //to check if the user is already a moderator for the apexcom
                    if (count($check)) {
                        DB::table('moderators')->where([
                            ['userID', '=', $userid],
                            ['apexID', '=', $apexid]
                            ])->delete();
                    } else {
                        DB::table('moderators')->insert(
                            ['apexID' => $apexid, 'userID' =>$userid]
                        );
                    }
                } else {
                    return response()->json(['error' => 'User doesnot exist'], 403);
                }
            } else {
                return response()->json(['error' => 'ApexCom doesnot exist'], 404);
            }
        } else {
            return response()->json(['error' => 'Unauthorized access'], 500);
        }
        return response()->json(['value'=>true], 200);
    }
}
