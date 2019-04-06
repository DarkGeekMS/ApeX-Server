<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\CommentVote;
use App\Models\Vote;
use App\Models\User;
use App\Models\Moderator;
use App\Models\ReportPost;
use App\Models\ReportComment;
use App\Models\SaveComment;
use App\Models\SavePost;
use App\Models\Message;
use App\Models\Hidden;
use App\Models\Post;

/**
 * @group Links and comments
 *
 * controls the comments , replies and private messages for each user
 */

class CommentandLinksController extends Controller
{
    /**
     * add
     * submit a new comment or reply to a comment on a post or reply to any message.
     * Success Cases :
     * 1) return true to ensure that the comment , reply is added successfully.
     * failure Cases:
     * 1) post fullname (ID) is not found.
     * 2) NoAccessRight token is not authorized.
     *
     * @bodyParam content string required The body of the comment.
     * @bodyParam parent string required The fullname of the thing to be replied to.
     * @bodyParam token JWT required Verifying user ID.
     * @response  404{
     * "error" : "user_not_found"
     * }
     * @response  404{
     * "error" : "post not exists"
     * }
     * @response  404{
     * "error" : "comment not exists"
     * }
     * @response  404{
     * "error" : "message not exists"
     * }
     * @response  400{
     * "token_error":"invalid Action"
     * }
     * @response  400{
     * "token_error":"The token has been blacklisted"
     * }
     */

    public function add(Request $request)
    {
      //get the logged in user
        $account=new AccountController;
        //get the user data
        $userID = $account->me($request)->getData()->user->id;
        $user = User::find($userID);
        //check if there is no content to be submitted return error message
        if (!$request['content']) {
            return response()->json(['error' => 'Comment content not found'], 404);
        }
        //get the post,comment or message to be replied
        $parent = $request['parent'];
        //if the parent was comment means the submitted is a reply
        if ($parent[1]==1) {              //add reply to comment ( or another reply)
          //get the parent comment and check valid one
            $comment = Comment::find($parent);
            //if not vali return error message
            if (!$comment) {
                return response()->json(['error' => 'no_comment_reply '], 404);
            }
            //check mention existance
            //create the comment id by getting the last comment id and increment it by 1
            $lastcom = DB::table('comments')->orderBy('created_at', 'desc')->first();
            $id = $lastcom->id;
            $count = DB::table('comments') ->where('created_at', $lastcom->created_at)->count();
            $newIdx = (int)explode("_", $id)[1];
            $id = "t1_".($newIdx + $count);
            //add this record in the database
            Comment::create([
              'commented_by'=> $user['id'],
              'parent' => $comment['id'],
              'root' =>$comment['root'],
              'id' =>$id,
              'content' => $request['content']
            ]);
            //return the id of the submitted reply
            return response()->json(['id' => $id], 200);
        } elseif ($parent[1]==3) {                   //add comment
          //get the post to be commented
            $post = Post::find($parent);
            //check valid post if not return error message
            if (!$post) {
                return response()->json(['error' => 'post not exists '], 404);
            }
            //check if any mention exists
            //create the comment id by getting the total count of comments table and increment it by 1
            $lastcom = DB::table('comments')->orderBy('created_at', 'desc')->first();
            $id = "t1_1";
            if ($lastcom) {
                $count = DB::table('comments') ->where('created_at', $lastcom->created_at)->count();
                $id = $lastcom->id;
                $newIdx = (int)explode("_", $id)[1];
                $id = "t1_".($newIdx+$count);
            }

            //insert the new record in the database
            Comment::create([
              'commented_by'=> $user['id'],
              'root' =>$parent,
              'id' =>$id,
              'content' => $request['content']
            ]);
            //return the id of the submitted comment
            return response()->json(['id' => $id], 200);
        } elseif ($parent[1]==4) {                  //reply to message
          //get the message to have a reply
            $message = Message::find($parent);
            //check valid message if not return error message
            if (!$message) {
                return response()->json(['error' => ' message not exists '], 404);
            }
            //get the receiver id from the parent message (messages can be done by only 2 users)
            $userF = 't2_0';
            if ($message['sender'] == $user['id']) {
                $userF = $message['receiver'];
            } else {
                $userF = $message['sender'];
            }
            //create the id of the new message by counting table messages records and increment it by 1
            $lastcom = DB::table('messages')->orderBy('created_at', 'desc')->first();
            $count = DB::table('messages') ->where('created_at', $lastcom->created_at)->count();
            $id = $lastcom->id;
            $newIdx = (int)explode("_", $id)[1];
            $id = "t4_".($newIdx+$count);
            //insert the new message record in the message table
            Message::create([
              'sender'=> $user['id'],
              'receiver' =>$userF,
              'id' =>$id,
              'content' => $request['content'],
              'subject' => $message['subject']
            ]);
            //return the id of the created message
            return response()->json(['id' => $id], 200);
        }
        //return error message if the request called for anything except post ,comment or message
        return response()->json(['error' => 'invalid Action'], 400);
    }



    /**
     * delete
     * to delete a post or comment or reply from any ApexCom by the owner of the thing,
     * the moderator of this ApexCom or any admin.
     * Success Cases :
     * 1) return true to ensure that the post, comment or reply is deleted successfully.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) NoAccessRight the token is not for the owner of the thing to be deleted or the moderator of this ApexCom.
     * 3) post , comment or reply fullname (ID) is not found.
     *
     * @bodyParam name string required The fullname of the post,comment or reply to be deleted.
     * @bodyParam token JWT required Verifying user ID.
     * @response  404{
     * "error" : "user_not_found"
     * }
     * @response  404{
     * "error" : "post not exists"
     * }
     * @response  404{
     * "error" : "comment not exists"
     * }
     * @response  400{
     * "token_error":"invalid user"
     * }
     * @response  400{
     * "token_error":"invalid action"
     * }
     * @response  400{
     * "token_error":"The token has been blacklisted"
     * }
     */

    public function delete(Request $request)
    {
        //get the logged in user id
        $account=new AccountController;
        $userID = $account->me($request)->getData()->user->id;
        //get user data by id
        $user = User::find($userID);

        $name = $request['name'];
        //check the thing to be deleted is post or comment
        if ($name[1]==3) {                           //post
          //get the post
            $post = Post::find($name);
            //if post not exists return error message
            if (!$post) {
                return response()->json(['error' => 'post not exists'], 404);
            }
            //if the user was admin delete the post and return true
            if ($user['type'] ==3) {
                $post->delete();
                return response()->json(['deleted' => true], 200);
            }
            //if theuser was the post owenr delete the post and return true
            if ($user['id'] == $post['posted_by']) {
                $post->delete();
                return response()->json(['deleted' => true], 200);
            }
            //check if the user was moderator in the apeXcom holds this post
            $moderator = DB::table('moderators')->where('userID', $user['id'])
            ->where('apexID', $post['apex_id'])->get();
            //if he was moderator delete the post and return true
            if (count($moderator)) {
                $post->delete();
                return response()->json(['deleted' => true], 200);
            }
            //if not admin,moderator or post owner return error message invalid action
            return response()->json(['error' => 'invalid user'], 400);
        } elseif ($name[1]==1) {                     //if comment
          //get the comment to be deleted
            $comment = Comment::find($name);
            //check the validity of this comment if not exists return error message
            if (!$comment) {
                return response()->json(['error' => 'comment not exists'], 404);
            }
            //the user was admin delete the comment and return true
            if ($user['type'] ==3) {
                $comment->delete();
                return response()->json(['deleted' => true], 200);
            }
            //if the user was the owner of the comment delete it and return true
            if ($user['id'] == $comment['commented_by']) {
                $comment->delete();
                return response()->json(['deleted' => true], 200);
            }
            //get the post has this comment to check if the user was this post owner
            $post = Post::find($comment['root']);
            //if so delete the comment and return true (post owner can delete any comment on his post)
            if ($user['id'] == $post['posted_by']) {
                $comment->delete();
                return response()->json(['deleted' => true], 200);
            }
            //check if the user was moderator in the apeXcom holds this comment
            $moderator = DB::table('moderators')->where('userID', $user['id'])
            ->where('apexID', $post['apex_id'])->get();
            //if so delete the comment and return true
            if (count($moderator)) {
                $comment->delete();
                return response()->json(['deleted' => true], 200);
            }
            //if not return error message
            return response()->json(['error' => 'invalid user'], 400);
        }
        //if the thing to be deleted wasn't post or comment return error message
        return response()->json(['error' => 'invalid Action'], 400);
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
     * check the user id the post owner or admin in the ApexCom or moderator in the ApexCom holds the post
     * to be able to lock this post otherwise error message Not Allowed will return.
     * Success Cases :
     * 1) return true to ensure that the post was locked/unlock.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) post fullname (ID) is not found.
     * 3) NoAccessRight the user ID is not for the owner of the post or a moderator in the ApexCom includes this post.
     *
     * @bodyParam name string required The fullname of the post to be locked.
     * @bodyParam token JWT required Verifying user ID.
     * @response  404{
     * "error" : "user_not_found"
     * }
     * @response  404{
     * "error" : "post not exists"
     * }
     * @response  400{
     * "token_error":"Not allowed"
     * }
     * @response  400{
     * "token_error":"The token has been blacklisted"
     * }
     */

    public function lock(Request $request)
    {
        //get the user id using the token
        $account=new AccountController;
        $userID = $account->me($request)->getData()->user->id;
        //get the user by the user id
        $user = User::find($userID);

        //get the post to be locked (if allowed)
        $post = Post::find($request['name']);
        //check valid post
        if (!$post) {
            return response()->json(['error' => 'post not exists'], 404);
        }
        // admin can lock/unlock any post    admin type => 3
        if ($user['type'] ==3) {
            $post->locked = !($post->locked);            //toggle the post lock state
            $post->save();
        //return true to ensure that the post locked/unlocked successfully
            return response()->json(['locked' => true], 200);
        }
        // any user can lock/unlock his own posts
        if ($user['id'] == $post['posted_by']) {
            $post->locked = !($post->locked);
            $post->save();
        //return true to ensure that the post locked/unlocked successfully
            return response()->json(['locked' => true], 200);
        }
        //check if moderator in the ApexCom where this post exists
        $moderator = DB::table('moderators')->where('userID', $user['id'])->where('apexID', $post['apex_id'])->get();
        //moderators can lock/unlock any post in their ApexComs.
        if (count($moderator)) {
            $post->locked = !($post->locked);
            $post->save();
            return response()->json(['locked' => true], 200);
        }
        //if not admin, Apex moderator or post owner action is not allowed.
        return response()->json(['error' => 'Not allowed'], 400);
    }




    /**
     * hide
     * to hide or UnHide a post from the user view.
     * check valid user and post and if the post was hidden it removes it from hiddens and vice versa.
     * Success Cases :
     * 1) return true to ensure that the post hidden.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) post fullname (ID) is not found.
     *
     * @bodyParam name string required The fullname of the post to be hidden.
     * @bodyParam token JWT required Verifying user ID.
     * @response  404{
     * "error" : "user_not_found"
     * }
     * @response  404{
     * "error" : "post not exists"
     * }
     * @response  400{
     * "token_error":"The token has been blacklisted"
     * }
     */

    public function hide(Request $request)
    {
        //get the user id using the token
        $account=new AccountController;
        $userID = $account->me($request)->getData()->user->id;
        //get the user by the user id
        $user = User::find($userID);
        //get the post to be hidden (if allowed)
        $post = Post::find($request['name']);
        //check valid post
        if (!$post) {
            return response()->json(['error' => 'post not exists'], 404);
        }
        //check if the post already hidden ( so un-hide the post )
        $hide = DB::table('hiddens')->where('userID', $user['id'])->where('postID', $post['id'])->get();
        //if post not hidden, add it to the hidden posts of this user.
        if (!count($hide)) {
            Hidden::create([
            'postID' => $post['id'],
            'userID' => $user['id']
            ]);
            //return true to ensure that the post hidden successfully
            return response()->json(['hidden' => true], 200);
        }
        // if post already hidden remove the relation record so post un-hidden.
        DB::table('hiddens')->where('userID', $user['id'])->where('postID', $post['id'])->delete();
        //return true to ensure that the post un-hidden successfully
        return response()->json(['hidden' => true], 200);
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


    public function guestMoreChildren()
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
     * @bodyParam content string The reason for the report from an associative array.
     * (will be in frontend).
     * @bodyParam token JWT required Verifying user ID.

     * @response  404{
     * "error" : "user_not_found"
     * }
     * @response  404{
     * "error" : "post not exists"
     * }
     * @response  404{
     * "error" : "report content not found"
     * }
     * @response  404{
     * "error" : "comment_not_found"
     * }
     * @response  400{
     * "error" : "invalid Action"
     * }
     * @response  400{
     * "token_error":"The token has been blacklisted"
     * }
     */

    public function report(Request $request)
    {
        //get the user id using the token
        $account=new AccountController;
        $userID = $account->me($request)->getData()->user->id;
        //get the user by the user id
        $user = User::find($userID);

        //admin can't report any post or comment (he can take any action againest the post)
        if ($user['type'] ==3) {
            return response()->json(['error' => 'invalid Action'], 400);
        }
        if (!$request['content']) {
            return response()->json(['error' => 'report content not found'], 404);
        }
        //check reporting post or comment (post id start with t3_ , comment id start with t1_)
        $name = $request['name'];
        //if the report request from post
        if ($name[1]==3) {                   //post
          //get the post to be reported
            $post = Post::find($name);
            //check valid post
            if (!$post) {
                return response()->json(['error' => 'post_not_exists'], 404);
            }
            //one can't report any post written by him.
            if ($user['id'] == $post['posted_by']) {
                 return response()->json(['error' => 'invalid Action'], 400);
            }
            //moderators of any ApexComs can't report posts in the apexCom they are moderators in.
            $moderator = DB::table('moderators')->where('userID', $user['id'])
            ->where('apexID', $post['apex_id'])->get();
            //if the user was moderator in the ApexCom include the reported post return.
            if (count($moderator)) {
                return response()->json(['error' => 'invalid Action'], 400);
            }
            //one can report any post only once, so check if the report exists.
            $report = DB::table('report_posts')->where('userID', $user['id'])->where('postID', $post['id'])->get();
            //if the report was new create one.
            if (!count($report)) {
                ReportPost::create([
                'postID' => $post['id'],
                'userID' => $user['id'],
                'content' => $request['content']
                ]);
                //return true to ensure that the report done successfully
                return response()->json(['reported' => true], 200);
            } else {
                return response()->json(['error' => 'You already report this post'], 400);
            }
        //if the report request from comment
        } elseif ($name[1] ==1) {           //comment
          //get the comment to be reported
            $comment = Comment::find($name);

            //check valid comment
            if (!$comment) {
                return response()->json(['error' => 'comment_not_found'], 404);
            }
            //one can't report his own comments.
            if ($user['id'] == $comment['commented_by']) {
                 return response()->json(['error' => 'invalid Action'], 400);
            }
            //get the post that has this comment
            $post = Post::find($comment['root']);
            //one can't report any comment on his post (as he can delete it)
            if ($user['id'] == $post['posted_by']) {
                 return response()->json(['error' => 'invalid Action'], 400);
            }
            //moderators of any ApexComs can't report comment in the apexCom they are moderators in.
            $moderator = DB::table('moderators')->where('userID', $user['id'])
            ->where('apexID', $post['apex_id'])->get();
            //if the user was moderator in the ApexCom include the reported comment return.
            if (count($moderator)) {
                return response()->json(['error' => 'invalid Action'], 400);
            }
            //one can report any comment only once, so check if the report exists.
            $report = DB::table('report_comments')->where('userID', $user['id'])->where('comID', $comment['id'])->get();
            //if the report was new create one.
            if (!count($report)) {
                ReportComment::create([
                'comID' => $comment['id'],
                'userID' => $user['id'],
                'content' => $request['content']
                ]);
                //return true to ensure that the report done successfully
                return response()->json(['reported' => true], 200);
            } else {
                return response()->json(['error' => 'You already report this comment'], 400);
            }
        }
        //only posts and comments ( including replies to comments) can be reported.
        return response()->json(['error' => 'invalid Action'], 400);
    }



    /**
     * vote
     * cast a vote on a post , comment or reply.
     * Success Cases :
     * 1) return total number of votes on this post,comment or reply.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) fullname of the thing to vote on is not found.
     * 3) direction of the vote is not integer between -1 , 1.
     *
     * @bodyParam name string required The fullname of the post,comment or reply to vote on.
     * @bodyParam dir int required The direction of the vote ( 1 up-vote , -1 down-vote , 0 un-vote).
     * @bodyParam token JWT required Verifying user ID.
     * @response  404{
     * "error" : "user_not_found"
     * }
     * @response  404{
     * "error" : "post not exists"
     * }
     * @response  400{
     * "error":"Invalid Action"
     * }
     * @response  400{
     * "token_error":"The token has been blacklisted"
     * }
     */

    public function vote(Request $request)
    {
        //get the logged in user
        $account=new AccountController;
        //get the id of the user to get the user data
        $userID = $account->me($request)->getData()->user->id;
        $user = User::find($userID);

        //check if the vote direction is invalid
        if ($request['dir'] != 1 && $request['dir'] != -1) {
           //return invalid action if the vote direction is not 1 (up-vote) or -1 (down vote)
            return response()->json(['error' => 'Invalid Action'], 400);
        }
        //check the id of the voted thing ( post or comment )
        $name = $request['name'];
        //if post
        if ($name[1]==3) {
           //get this post
            $post = Post::find($name);
            if (!$post) {
              //return error message if the post not found
                return response()->json(['error' => 'post_not_found'], 404);
            }
            //check if the user voted on this post before or not
            $exists = DB::table('votes')->where('postID', $name)
             ->where('userID', $user['id'])->get();

             //if not we create this record
            if (!count($exists)) {
                Vote::create([
                  'postID' => $request['name'] ,
                  'userID' => $user['id'],
                  'dir' => $request['dir']
                ]);
                //get the total count of votes on this post and return it
                $NoVotes = DB::table('votes')->where('postID', $request['name'])->sum('dir');
                return response()->json(['votes' => $NoVotes], 200);
            }
            //if the user voted in this post before, get the previous vote direction
            $dir = DB::table('votes')->where('postID', $request['name'])
             ->where('userID', $user['id'])->value('dir');
             //if the user votes in the same direction ( cancel the vote)
            if ($dir == $request['dir']) {
              //delete the record of this vote and return the total number of votes in this post
                DB::table('votes')->where('userID', $user['id'])->where('postID', $request['name'])->delete();
                $NoVotes = DB::table('votes')->where('postID', $request['name'])->sum('dir');
                return response()->json(['votes' => $NoVotes], 200);
            } else {
              //if not we update the vote by its new value and return the total number of votes on this post
                DB::table('votes')->where('userID', $user['id'])
                ->where('postID', $request['name'])->update(['dir' => $request['dir']]);

                $NoVotes = DB::table('votes')->where('postID', $request['name'])->sum('dir');
                return response()->json(['votes' => $NoVotes], 200);
            }
            //if comment
        } elseif ($name[1]==1) {
          //get this comment
            $comment = Comment::find($name);
            //check if this comment exists otherwise return error message comment not exists
            if (!$comment) {
                return response()->json(['error' => 'comment not exists'], 404);
            }
            //check if the user voted on this comment before or not
            $exists = DB::table('comment_votes')->where('comID', $request['name'])
             ->where('userID', $user['id'])->get();
             //if not we create this record
            if (!count($exists)) {
                CommentVote::create([
                    'comID' => $request['name'] ,
                    'userID' => $user['id'],
                    'dir' => $request['dir']
                ]);
                //get the total count of votes on this post and return it
                $NoVotes = DB::table('comment_votes')->where('comID', $request['name'])->sum('dir');
                return response()->json(['votes' => $NoVotes], 200);
            }
            //if the user voted in this post before, get the previous vote direction
            $dir = DB::table('comment_votes')->where('comID', $request['name'])
             ->where('userID', $user['id'])->value('dir');
             //if the user votes in the same direction ( cancel the vote)
            if ($dir == $request['dir']) {
              //delete the record of this vote and return the total number of votes in this post
                DB::table('comment_votes')->where('userID', $user['id'])->where('comID', $request['name'])->delete();
                $NoVotes = DB::table('comment_votes')->where('comID', $request['name'])->sum('dir');
                return response()->json(['votes' => $NoVotes], 200);
            } else {
              //if not we update the vote by its new value and return the total number of votes on this post
                DB::table('comment_votes')->where('userID', $user['id'])
                ->where('comID', $request['name'])->update(['dir' => $request['dir']]);

                $NoVotes = DB::table('comment_votes')->where('comID', $request['name'])->sum('dir');
                return response()->json(['votes' => $NoVotes], 200);
            }
        }
        //if the name sent was not for post or comment return error message
        return response()->json(['error' => 'Invalid Action'], 400);
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

    public function save(Request $request)
    {
       //get the logged in user
        $account=new AccountController;
        $user = $account->me($request)->getData()->user;
        $id= $user->id;
        $validator = validator(
            $request->all(),
            ['ID' => 'required|string']
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }
        //check if the thing to be saved is post or comment by checking both tables
        $commentid=$request['ID'];
        $comment=DB::table('comments')->where('id', '=', $commentid)->get();


        $postid=$request['ID'];
        $post=DB::table('posts')->where('id', '=', $postid)->get();
        //if comment
        if (count($comment)) {                                            //to check that the comment exists
            $commentsaved=DB::table('save_comments')->where([                   //to check if the comment is saved
                ['comID', '=', $commentid],
                ['userID', '=', $id]
                ])->get();
                //if the comment was saved delete its record so it will be un-saved
            if (count($commentsaved)) {
                DB::table('save_comments')->where([
                ['comID', '=', $commentid],
                ['userID', '=', $id]
                ])->delete();
            } else {
              //otherwise insert it so it's saved
                DB::table('save_comments')-> insert(['comID' => $commentid, 'userID' =>$id]);
            }
            //if post
        } elseif (count($post)) {                                                      //to check that the post exists
            $postsaved=DB::table('save_posts')->where([                                  //to check if the post is saved
                ['postID', '=', $postid],
                ['userID', '=', $id]
                ])->get();
                //if the post was saved delete its record so it's un-saved
            if (count($postsaved)) {
                DB::table('save_posts')->where([
                ['postID', '=', $postid],
                ['userID', '=', $id]
                ])->delete();
            } else {
              //otherwise insert it so it's saved
                DB::table('save_posts')->insert(['postID' => $postid, 'userID' =>$id]);
            }
        } else {
          //if no post or comment return error message
            return response()->json(['error' => 'post or comment doesnot exist'], 404);
        }
        //return true to ensure that the post is saved/unsaved successfully
        return response()->json(['value'=>true], 200);
    }
}
