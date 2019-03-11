<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Links and comments
 *
 * controls the comments , replies and private messages for each user
 */

class Comment extends Controller
{

    /**
     * add
     * submit a new comment or reply to a comment on a post.
     * Success Cases :
     * 1) return true to ensure that the comment , reply is added successfully.
     * failure Cases:
     * 1) post fullname (ID) is not found.
     * 2) NoAccessRight token is not authorized.
     *
     * @bodyParam name string required The fullname of the comment to be submitted ( comment , reply , message).
     * @bodyParam content string required The body of the comment.
     * @bodyParam parent_ID string required The fullname of the thing to be replied to.
     * @bodyParam AuthID JWT required Verifying user ID.
     */

    public function add()
    {
        return;
    }



    /**
     * delete
     * to delete a post or comment or reply from any ApexCom by the owner of the thing or the moderator of this ApexCom.
     * Success Cases :
     * 1) return true to ensure that the post, comment or reply is deleted successfully.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) NoAccessRight the token is not for the owner of the thing to be deleted or the moderator of this ApexCom.
     * 3) post , comment or reply fullname (ID) is not found.
     *
     * @bodyParam name string required The fullname of the post,comment or reply to be deleted.
     * @bodyParam ID JWT required Verifying user ID.
     */

    public function delete()
    {
        return;
    }




    /**
     * editText
     * to edit the text of a post , comment or reply by its owner.
     * Success Cases :
     * 1) return true to ensure that the post or comment updated successfully.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) NoAccessRight the token is not for the owner of the post or comment to be edited.
     * 3) post or commet fullname (ID) is not found.
     *
     * @bodyParam name string required The fullname of the self-post ,comment or reply to be edited.
     * @bodyParam content string required The body of the thing to be edited.
     * @bodyParam ID JWT required Verifying user ID.
     */

    public function editText()
    {
        return;
    }



    /**
     * lock
     * to lock or unlock a post so it can't recieve new comments.
     * Success Cases :
     * 1) return true to ensure that the post was locked.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) post fullname (ID) is not found.
     * 3) NoAccessRight the user ID is not for the owner of the post or a moderator in the ApexCom includes this post.
     *
     * @bodyParam name string required The fullname of the post to be locked.
     * @bodyParam ID JWT required Verifying user ID.
     */

    public function lock()
    {
        return;
    }




    /**
     * hide
     * to hide or UnHide a post from the user view.
     * Success Cases :
     * 1) return true to ensure that the post hidden.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) post fullname (ID) is not found.
     *
     * @bodyParam name string required The fullname of the post to be hidden.
     * @bodyParam ID JWT required Verifying user ID.
     */

    public function hide()
    {
        return;
    }



    /**
     * moreChildren
     * to retrieve additional comments omitted from a base comment tree (comment , replies , private messages).
     * Success Cases :
     * 1) return thr retrieved comments or replies (10 reply at a time ).
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) post , comment , reply or message fullname (ID) is not found for any of the parent IDs.
     *
     * @bodyParam parent string required The fullname of the posts whose comments are being fetched
     * ( post , comment or message ).
     * @bodyParam ID JWT required Verifying user ID.
     */


    public function moreChildren()
    {
        return;
    }



    /**
     * report
     * report a post , comment or a message to the ApexCom moderator
     * ( message's reports will be sent to the site admin), posts or comments will be hidden implicitly as well.
     * ( moderators don't report posts).
     * Success Cases :
     * 1) return true to ensure that the report is sent to the moderator of the ApexCom.
     * failure Cases:
     * 1) send reason (index) out of the associative array range.
     * 2) NoAccessRight token is not authorized.
     *
     * @bodyParam name string required The fullname of the post,comment or message to report.
     * @bodyParam Reason int The index represent the reason for the report from an associative array.
     * (will be in frontend and backend as well).
     * @bodyParam ID JWT required Verifying user ID.
     */

    public function report()
    {
        return;
    }



    /**
     * vote
     * cast a vote on a post , comment or reply.
     * Success Cases :
     * 1) return total number of votes on this post,comment or reply.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) fullname of the thing to vote on is not found.
     * 3) direction of the vote is not integer between -1 , 0 , 1.
     *
     * @bodyParam name string required The fullname of the post,comment or reply to vote on.
     * @bodyParam direction int required The direction of the vote ( 1 up-vote , -1 down-vote , 0 un-vote).
     * @bodyParam ID JWT required Verifying user ID.
     */

    public function vote()
    {
        return;
    }




    /**
     * save
     * Save or UnSave a post or a comment.
     * Success Cases :
     * 1) return true to ensure that the post saved successfully.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) post fullname (ID) is not found.
     *
     * @bodyParam ID string required The ID of the comment or post.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function save()
    {
        return;
    }
}
