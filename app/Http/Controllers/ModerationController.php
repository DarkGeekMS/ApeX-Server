<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AccountController;
use App\Models\ApexCom as apexComModel;
use App\Models\ApexBlock;
use App\Models\User;
use App\Models\Moderator;
use App\Models\Post;
use App\Models\Comment;
use App\Models\ReportComment;
use App\Models\ReportPost;

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
     * @bodyParam token JWT required Verifying user ID.
     */

    public function blockUser(Request $request)
    {
        $account = new AccountController();
        $User = $account->me($request)->getData()->user;
        $moderator_id = $User->id;
        $apex_id = $request['ApexCom_id'];
        $user_id = $request['user_id'];
        $moderator_type = $User->type;

        // checking if the apexCom exists.
        $exists = apexComModel::where('id', $apex_id)->count();

        // return an error message if the id (fullname) of the apexcom was not found.
        if (!$exists) {
            return response()->json(['error' => 'ApexCom is not found.'], 404);
        }

        // checking if the user exists.
        $exists = User::where('id', $user_id)->count();

        // return an error message if the user was not found.
        if (!$exists) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $user_type = User::find($user_id);
        $user_type = $user_type->type;

        // checking if the user is a moderator for this apexcom.
        $IsModerator = Moderator::where(
            [['apexID', $apex_id], ['userID', $moderator_id]]
        )->count();

        if (!$IsModerator && $moderator_type != 3) {
            return response()->json(['error' => 'You are not a moderator of this apexcom.'], 400);
        }

        // checking if the other user (blocked user) is a moderator for this apexcom or a siteadmin.
        $IsModerator = Moderator::where(
            [['apexID', $apex_id], ['userID', $user_id]]
        )->count();

        if ($IsModerator || $user_type == 3) {
            return response()->json(['error' => 'You can not block a moderator in the apexcom.'], 400);
        }

        // checking if the user is already blocked
        $Isblocked = ApexBlock::where(
            [['ApexID', '=',$apex_id],['blockedID', '=',$user_id]]
        )->count();

        // return an error for if the user was already blocked from the apexcom.
        if ($Isblocked != 0) {
            return response()->json(['error' => 'The user is already blocked from this Apexcom'], 400);
        }

        ApexBlock::create(
            [
                'ApexID' => $apex_id,
                'blockedID' => $user_id
            ]
        );

        // return true to ensure the success of blocking from the apexcom.
        return response()->json('Blocked', 200);
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
     * @bodyParam user_id string required The fullname of the user who posted the comment or post to be ignored.
     * @bodyParam reported_id string required The fullname of the post or comment to be ignored.
     * @bodyParam token JWT required Verifying user ID.
     */

    public function ignoreReport(Request $request)
    {
        $account = new AccountController();
        $User = $account->me($request)->getData()->user;
        $moderator_id = $User->id;
        $report_id = $request['report_id'];
        $user_id = $request['user_id'];
        $moderator_type = $User->type;

        // checking if the user exists.
        $exists = User::where('id', $user_id)->count();

        // return an error message if the user was not found.
        if (!$exists) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        // getting apexcom of the reported comment or post;
        $apex_id = 0;
        $exists1 = Post::where('id', $report_id)->count();
        if ($exists1) {
            $apex_id = Post::where('id', $report_id)->get();
            $apex_id = $apex_id[0]->apex_id;
        }

        $exists2 = Comment::where('id', $report_id)->count();
        if ($exists2) {
            $apex_id = Comment::where('id', $report_id)->get();
            $apex_id = Post::where('id', $apex_id[0]->root)->get();
            $apex_id = $apex_id[0]->apex_id;
        }
        if (!$exists1 && !$exists2) {
            // if it was not a report on post or comment return a message error
            return response()->json(['error' => 'Unable to find a post or a comment.'], 404);
        }

        // checking if the user is a moderator for this apexcom if not return an error message.
        $IsModerator = Moderator::where(
            [['apexID', $apex_id], ['userID', $moderator_id]]
        )->count();

        if (!$IsModerator && $moderator_type != 3) {
            return response()->json(['error' => 'You have no rights to edit posts or comments in this apexcom.'], 400);
        }

        // checking if the reported was a comment
        $IsComment = ReportComment::where(
            [['comID', $report_id], ['userID', $user_id]]
        )->count();

        if ($IsComment) {
            // delete the report and return deleted report on comment
            ReportComment::where([['comID', '=',$report_id],['userID', '=',$user_id] ])->delete();

            return response()->json('Ignore report on comment', 200);
        }

        // checking if the reported was a post
        $IsPost = ReportPost::where(
            [['postID', $report_id], ['userID', $user_id]]
        )->count();

        if ($IsPost) {
            // delete the report and return deleted report on post
            ReportPost::where([['PostID', '=',$report_id],['userID', '=',$user_id] ])->delete();

            return response()->json('Ignore report on Post', 200);
        }

        // if it was not a report on post or comment return a message error
        return response()->json(['error' => 'Report not found.'], 404);
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
     * @bodyParam token JWT required Verifying user ID.
     */

    public function reviewReports(Request $request)
    {
        $account = new AccountController();
        $User = $account->me($request)->getData()->user;
        $moderator_id = $User->id;
        $apex_id = $request['ApexCom_id'];
        $moderator_type = $User->type;

        // checking if the apexCom exists.
        $exists = apexComModel::where('id', $apex_id)->count();

        // return an error message if the id (fullname) of the apexcom was not found.
        if (!$exists) {
            return response()->json(['error' => 'ApexCom is not found.'], 404);
        }

        // checking if the user is a moderator for this apexcom if not return an error message.
        $IsModerator = Moderator::where(
            [['apexID', $apex_id], ['userID', $moderator_id]]
        )->count();

        if (!$IsModerator && $moderator_type != 3) {
            return response()->json(['error' => 'You have no rights to review reports on posts or comments in this apexcom.'], 400);
        }

        // get all posts that belongs to apexcom
        $posts = Post::where('apex_id', '=', $apex_id);

        // get the comments on the posts of the apexcom
        $comments = Comment::joinSub(
            $posts,
            'apex_posts',
            function ($join) {
                $join->on('root', '=', 'apex_posts.id');
            }
        )->select(
            ['comments.id AS commentid', 'comments.content AS commentcontent',
             'commented_by', 'root', 'parent', 'apex_posts.*']
        );

        // get all reported comments that belong to posts of the apexcom
        $reportedcomments = ReportComment::joinSub(
            $comments,
            'comments_posts',
            function ($join) {
                $join->on('comID', '=', 'comments_posts.commentid');
            }
        )->get(
            ['comID', 'userID','report_comments.created_at AS report_created_at',
            'report_comments.updated_at AS report_updated_at',
            'report_comments.content AS report_content', 'comments_posts.*']
        )->map(
            /**
             * A callback function to split the information in every row
             * to associative array that has three keys post, comment and report.
             * Each of which contains the related information to the key.
             *
             * @return Array
             */
            function ($item) {
                return [
                    'post' => [
                        'id' => $item['id'], 'posted_by' => $item['posted_by'],
                        'apex_id' => $item['apex_id'], 'title' => $item['title'],
                        'img' => $item['img'], 'videolink' => $item['videolink'],
                        'content' => $item['content'], 'locked' => $item['locked'],
                        'apex_com_name' => apexComModel::find($item['apex_id'])->name,
                        'post_writer_username' => User::find($item['posted_by'])->username
                    ],
                    'comment' => [
                        'id' => $item['commentid'], 'parent' => $item['parent'],
                        'root' => $item['root'], 'content' =>$item['commentcontent'],
                        'commented_by' => $item['commented_by'], 
                        'writerUsername' => User::find($item['commented_by'])->username
                    ],
                    'report' => [
                        'userID' => $item['userID'], 'comID' => $item['comID'],
                        'content' => $item['report_content'],
                        'created_at' => $item['report_created_at'],
                        'updated_at' => $item['report_updated_at']
                    ]
                ];
            }
        )->toArray();

        // get all reported posts of the apexcom.
        $reportedposts = ReportPost::joinSub(
            $posts,
            'apex_posts',
            function ($join) {
                $join->on('postID', '=', 'id');
            }
        )->get(
            ['postID', 'userID','report_posts.created_at AS report_created_at',
            'report_posts.updated_at AS report_updated_at',
            'report_posts.content AS report_content', 'apex_posts.*']
        )->map(
            /**
             * A callback function to split the information in every row
             * to associative array that has two keys post and the report.
             * Each of which contains the related information to the key.
             *
             * @return Array
             */
            function ($item) {
                return [
                    'post' => [
                        'id' => $item['id'], 'posted_by' => $item['posted_by'],
                        'apex_id' => $item['apex_id'], 'title' => $item['title'],
                        'img' => $item['img'], 'videolink' => $item['videolink'],
                        'content' => $item['content'], 'locked' => $item['locked'],
                        'apex_com_name' => apexComModel::find($item['apex_id'])->name,
                        'post_writer_username' => User::find($item['posted_by'])->username
                    ],
                    'report' => [
                        'userID' => $item['userID'], 'postID' => $item['postID'],
                        'content' => $item['report_content'],
                        'created_at' => $item['report_created_at'],
                        'updated_at' => $item['report_updated_at']
                    ]
                ];
            }
        )->toArray();

        // combine the reported posts and reported comments in one array and return it.
        $reported = array(
                'ReportedPosts' => $reportedposts,
                'ReportedComments' => $reportedcomments
        );
        return $reported;
    }
}
