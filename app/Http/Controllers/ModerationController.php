<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Moderation
 *
 * Controls the Moderators actions.
 */

class ModerationController extends Controller
{

    /**
     * blockUser
     * to block a user from ApexCom he is moderator in so that he can't interact in this ApexCom anymore.
     * Success Cases :
     * 1) return true to ensure that the post or comment is removed successfully.
     * failure Cases:
     * 1) NoAccessRight the token is not for the moderator of this ApexCom including the post or comment to be removed.
     * 2) user fullname (id) is not found , already blocked or not subscribed in this ApexCom.
     *
     * @bodyParam ApexCom_id string required The fullname of the community where the user is blocked.
     * @bodyParam user_id string required The fullname of the user to be blocked.
     * @bodyParam _token JWT required Verifying user ID.
     */

    public function blockUser()
    {
        return;
    }



    /**
     * ignoreReport
     * to delete the ignored report from  ApexCom's reports.
     * Success Cases :
     * 1) return true to ensure that the report is deleted successfully.
     * failure Cases:
     * 1) NoAccessRight the token is not for the moderator of this ApexCom including the report to be removed.
     * 2) report fullname (id) is not found.
     *
     * @bodyParam report_id string required The fullname of the report to be ignored.
     * @bodyParam _token JWT required Verifying user ID.
     */

    public function ignoreReport()
    {
        return;
    }

    /**
     * reviewReports
     * view the reports sent by any user for any post or comment in the ApexCom he is moderator in.
     * Success Cases :
     * 1) return the reported posts and comments.
     * failure Cases:
     * 1) NoAccessRight the token is not for the moderator of this ApexCom.
     *
     * @bodyParam ApexCom_id string required The fullname of the community where the reported comments or posts.
     * @bodyParam _token JWT required Verifying user ID.
     */

    public function reviewReports()
    {
        return;
    }
}
