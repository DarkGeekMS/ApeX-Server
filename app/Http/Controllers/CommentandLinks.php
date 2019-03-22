<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\comment;
use App\commentVote;
use App\vote;
use App\User;
use App\moderator;
use App\reportPost;
use App\reportComment;
use App\saveComment;
use App\savePost;
use App\message;
use App\hidden;
use App\post;
use App\Http\Controllers\Account;

/**
 * @group Links and comments
 *
 * controls the comments , replies and private messages for each user
 */

class CommentandLinks extends Controller
{
    //private $account=new Account ;
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
     * @bodyParam parent string required The fullname of the thing to be replied to.
     * @bodyParam token JWT required Verifying user ID.
     */

    public function add(Request $request)
    {

        $account=new Account ;
        $userID = $account->me($request);
        if (!array_key_exists('user', $userID->getData())) {
                //there is token_error or user_not found_error
                return $userID;
        }
        $userID = $account->me($request)->getData()->user->id;
        $user = User::find($userID);

        if (!$request['content']) {
            return response()->json(['error' => 'Comment content not found'], 404);
        }
        $parent = $request['parent'];

        if ($parent[1]==1) {              //add reply to comment ( or another reply)
            $comment = comment::find($parent);
            if (!$comment) {
                return response()->json(['error' => 'no_comment_reply '], 404);
            }
            //check mention existance
            $count = DB::table('comments')->count();
            $id = "t1_".($count+1);
            DB::table('comments')->insert(['commented_by'=> $user['id'], 'root' =>$comment['root'],
            'parent' => $comment['id'] , 'id' =>$id, 'content' => $request['content']]);

            return response()->json(['id' => $id], 200);
        } elseif ($parent[1]==3) {                   //add comment
            $post = post::find($parent);

            if (!$post) {
                return response()->json(['error' => 'post not exists '], 404);
            }
            //check if any mention exists
            $count = DB::table('comments')->count();
            $id = "t1_".($count+1);
            DB::table('comments')->insert(['commented_by'=> $user['id'], 'root' =>$parent,
            'id' =>$id, 'content' => $request['content']]);
            return response()->json(['id' => $id], 200);
        } elseif ($parent[1]==4) {                  //reply to message
            $message = message::find($parent);
            if (!$message) {
                return response()->json(['error' => ' message not exists '], 404);
            }
            $userF = 't1_0';
            if ($message['sender'] == $user['id']) {
                $userF = $message['receiver'];
            } else {
                $userF = $message['sender'];
            }
            $count = DB::table('messages')->count();
            $id = "t4_".($count+1);

            DB::table('messages')->insert(['sender'=> $user['id'], 'receiver' =>$userF,
            'id' =>$id, 'content' => $request['content'], 'subject' => $message['subject']]);

            return response()->json(['id' => $id], 200);
        }
        return response()->json(['error' => 'invalid Action'], 400);
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
     * @bodyParam token JWT required Verifying user ID.
     */

    public function delete(Request $request)
    {

        $account=new Account ;
        $userID = $account->me($request);
        if (!array_key_exists('user', $userID->getData())) {
                //there is token_error or user_not found_error
                return $userID;
        }
        $userID = $account->me($request)->getData()->user->id;
        $user = User::find($userID);

        $name = $request['name'];

        if ($name[1]==3) {                           //post
            $post = post::find($name);

            if (!$post) {
                return response()->json(['error' => 'post not exists'], 404);
            }

            if ($user['type'] ==3) {
                $post->delete();
                return response()->json([true], 200);
            }

            if ($user['id'] == $post['posted_by']) {
                $post->delete();
                return response()->json([true], 200);
            }

            $moderator = DB::table('moderators')->where('userID', $user['id'])
            ->where('apexID', $post['apex_id'])->get();

            if (count($moderator)) {
                $post->delete();
                return response()->json([true], 200);
            }

            return response()->json(['error' => 'invalid user'], 404);
        } elseif ($name[1]==1) {                     //comment
            $comment = comment::find($name);

            if (!$comment) {
                return response()->json(['error' => 'comment not exists'], 404);
            }
            if ($user['type'] ==3) {
                $comment->delete();
                return response()->json([true], 200);
            }

            if ($user['id'] == $comment['commented_by']) {
                $comment->delete();
                return response()->json([true], 200);
            }

            $post = post::find($comment['root']);

            if ($user['id'] == $post['posted_by']) {
                $comment->delete();
                return response()->json([true], 200);
            }
            $moderator = DB::table('moderators')->where('userID', $user['id'])
            ->where('apexID', $post['apex_id'])->get();

            if (count($moderator)) {
                $post->delete();
                return response()->json([true], 200);
            }

            return response()->json(['error' => 'invalid user'], 404);
        }
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
     * Success Cases :
     * 1) return true to ensure that the post was locked.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) post fullname (ID) is not found.
     * 3) NoAccessRight the user ID is not for the owner of the post or a moderator in the ApexCom includes this post.
     *
     * @bodyParam name string required The fullname of the post to be locked.
     * @bodyParam token JWT required Verifying user ID.
     */

    public function lock(Request $request)
    {
        //get the user id using the token
        $account=new Account ;
        $userID = $account->me($request);
        if (!array_key_exists('user', $userID->getData())) {
                //there is token_error or user_not found_error
                return $userID;
        }
        $userID = $account->me($request)->getData()->user->id;
        //get the user by the user id
        $user = User::find($userID);

        //get the post to be locked (if allowed)
        $post = post::find($request['name']);
        //check valid post
        if (!$post) {
            return response()->json(['error' => 'post not exists'], 404);
        }
        // admin can lock/unlock any post    admin type => 3
        if ($user['type'] ==3) {
            $post->locked = !($post->locked);            //toggle the post lock state
            $post->save();
        //return true to ensure that the post locked/unlocked successfully
            return response()->json([true], 200);
        }
        // any user can lock/unlock his own posts
        if ($user['id'] == $post['posted_by']) {
            $post->locked = !($post->locked);
            $post->save();
        //return true to ensure that the post locked/unlocked successfully
            return response()->json([true], 200);
        }
        //check if moderator in the ApexCom where this post exists
        $moderator = DB::table('moderators')->where('userID', $user['id'])->where('apexID', $post['apex_id'])->get();
        //moderators can lock/unlock any post in their ApexComs.
        if (count($moderator)) {
            $post->locked = !($post->locked);
            $post->save();
            return response()->json([true], 200);
        }
        //if not admin, Apex moderator or post owner action is not allowed.
        return response()->json(['error' => 'Not allowed'], 404);
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
     * @bodyParam token JWT required Verifying user ID.
     */

    public function hide(Request $request)
    {
        //get the user id using the token
        $account=new Account ;
        $userID = $account->me($request);
        if (!array_key_exists('user', $userID->getData())) {
                //there is token_error or user_not found_error
                return $userID;
        }
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
            hidden::create([
            'postID' => $post['id'],
            'userID' => $user['id']
            ]);
            //return true to ensure that the post hidden successfully
            return response()->json([true], 200);
        }
        // if post already hidden remove the relation record so post un-hidden.
        DB::table('hiddens')->where('userID', $user['id'])->where('postID', $post['id'])->delete();
        //return true to ensure that the post un-hidden successfully
        return response()->json([true], 200);
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
     * @bodyParam token JWT required Verifying user ID.
     */

    public function report(Request $request)
    {
        //get the user id using the token
        $account=new Account ;
        $userID = $account->me($request);
        if (!array_key_exists('user', $userID->getData())) {
                //there is token_error or user_not found_error
                return $userID;
        }
        $userID = $account->me($request)->getData()->user->id;

        //get the user by the user id
        $user = User::find($userID);

        //admin can't report any post or comment (he can take any action againest the post)
        if ($user['type'] ==3) {
            return response()->json(['error' => 'invalid Action'], 404);
        }
        if (!$request['content']) {
            return response()->json(['error' => 'Comment content not found'], 404);
        }
        //check reporting post or comment (post id start with t3_ , comment id start with t1_)
        $name = $request['name'];
        //if the report request from post
        if ($name[1]==3) {                   //post
          //get the post to be reported
            $post = post::find($name);
            //check valid post
            if (!$post) {
                return response()->json(['error' => 'invalid Action'], 404);
            }
            //one can't report any post written by him.
            if ($user['id'] == $post['posted_by']) {
                 return response()->json(['error' => 'invalid Action'], 404);
            }
            //moderators of any ApexComs can't report posts in the apexCom they are moderators in.
            $moderator = DB::table('moderators')->where('userID', $user['id'])
            ->where('apexID', $post['apex_id'])->get();
            //if the user was moderator in the ApexCom include the reported post return.
            if (count($moderator)) {
                return response()->json(['error' => 'invalid Action'], 404);
            }
            //one can report any post only once, so check if the report exists.
            $report = DB::table('report_posts')->where('userID', $user['id'])->where('postID', $post['id'])->get();
            //if the report was new create one.
            if (!count($report)) {
                reportPost::create([
                'postID' => $post['id'],
                'userID' => $user['id'],
                'content' => $request['content']
                ]);
                //return true to ensure that the report done successfully
                return response()->json([true], 200);
            } else {
                return response()->json(['error' => 'You already report this post'], 404);
            }
        //if the report request from comment
        } elseif ($name[1] ==1) {           //comment
          //get the comment to be reported
            $comment = comment::find($name);

            //check valid comment
            if (!$comment) {
                return response()->json(['error' => 'comment_not_found'], 404);
            }
            //one can't report his own comments.
            if ($user['id'] == $comment['commented_by']) {
                 return response()->json(['error' => 'invalid Action'], 404);
            }
            //get the post that has this comment
            $post = post::find($comment['root']);
            //one can't report any comment on his post (as he can delete it)
            if ($user['id'] == $post['posted_by']) {
                 return response()->json(['error' => 'invalid Action'], 404);
            }
            //moderators of any ApexComs can't report comment in the apexCom they are moderators in.
            $moderator = DB::table('moderators')->where('userID', $user['id'])
            ->where('apexID', $post['apex_id'])->get();
            //if the user was moderator in the ApexCom include the reported comment return.
            if (count($moderator)) {
                return response()->json(['error' => 'invalid Action'], 404);
            }
            //one can report any comment only once, so check if the report exists.
            $report = DB::table('report_comments')->where('userID', $user['id'])->where('comID', $comment['id'])->get();
            //if the report was new create one.
            if (!count($report)) {
                reportComment::create([
                'comID' => $comment['id'],
                'userID' => $user['id'],
                'content' => $request['content']
                ]);
                //return true to ensure that the report done successfully
                return response()->json([true], 200);
            } else {
                return response()->json(['error' => 'You already report this comment'], 404);
            }
        }
        //only posts and comments ( including replies to comments) can be reported.
        return response()->json(['error' => 'invalid Action'], 404);
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

    public function vote(Request $request)
    {

        $account=new Account ;
        $userID = $account->me($request);
        if (!array_key_exists('user', $userID->getData())) {
                //there is token_error or user_not found_error
                return $userID;
        }
        $userID = $account->me($request)->getData()->user->id;
        $user = User::find($userID);
        $name = $request['name'];

        if ($name[1]==3) {
            $post = post::find($name);
            if (!$post) {
                return response()->json(['error' => 'post_not_found'], 404);
            }

            $exists = DB::table('votes')->where('postID', $name)
             ->where('userID', $user['id'])->get();

            if (!count($exists)) {
                vote::create([
                  'postID' => $request['name'] ,
                  'userID' => $user['id'],
                  'dir' => $request['dir']
                ]);

                $NoVotes = DB::table('votes')->where('postID', $request['name'])->sum('dir');
                return response()->json([$NoVotes], 200);
            }

            $dir = DB::table('votes')->where('postID', $request['name'])
             ->where('userID', $user['id'])->value('dir');

            if ($dir == $request['dir']) {
                DB::table('votes')->where('userID', $user['id'])->where('postID', $request['name'])->delete();
                $NoVotes = DB::table('votes')->where('postID', $request['name'])->sum('dir');
                return response()->json([$NoVotes], 200);
            } else {
                DB::table('votes')->where('userID', $user['id'])
                ->where('postID', $request['name'])->update(['dir' => $request['dir']]);

                $NoVotes = DB::table('votes')->where('postID', $request['name'])->sum('dir');
                return response()->json([$NoVotes], 200);
            }
        } elseif ($name[1]==1) {
            $comment = comment::find($name);

            if (!$comment) {
                return response()->json(['error' => 'comment not exists'], 404);
            }

            $exists = DB::table('comment_votes')->where('comID', $request['name'])
             ->where('userID', $user['id'])->get();

            if (!count($exists)) {
                commentVote::create([
                    'comID' => $request['name'] ,
                    'userID' => $user['id'],
                    'dir' => $request['dir']
                ]);

                $NoVotes = DB::table('comment_votes')->where('comID', $request['name'])->sum('dir');
                return response()->json([$NoVotes], 200);
            }
            $dir = DB::table('comment_votes')->where('comID', $request['name'])
             ->where('userID', $user['id'])->value('dir');

            if ($dir == $request['dir']) {
                DB::table('comment_votes')->where('userID', $user['id'])->where('comID', $request['name'])->delete();
                //$exists->delete();
                $NoVotes = DB::table('comment_votes')->where('comID', $request['name'])->sum('dir');
                return response()->json([$NoVotes], 200);
            } else {
                DB::table('comment_votes')->where('userID', $user['id'])
                ->where('comID', $request['name'])->update(['dir' => $request['dir']]);

                $NoVotes = DB::table('comment_votes')->where('comID', $request['name'])->sum('dir');
                return response()->json([$NoVotes], 200);
            }
        }
        return response()->json(['error' => 'invalid Action'], 404);
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
        $account=new Account ;
        $user=$account->me($request);
        $user=$user->getData()->user;
        $id= $user->id;

        $commentid=$request['ID'];
        $comment=DB::table('comments')->where('id', '=', $commentid)->get();


        $postid=$request['ID'];
        $post=DB::table('posts')->where('id', '=', $postid)->get();

        if (count($comment)) {                                            //to check that the comment exists
            $commentsaved=DB::table('savecomments')->where([                   //to check if the comment is saved
                ['comID', '=', $commentid],
                ['userID', '=', $id]
                ])->get();

            if (count($commentsaved)) {
                DB::table('savecomments')->where([
                ['comID', '=', $commentid],
                ['userID', '=', $id]
                ])->delete();
            } else {
                DB::table('savecomments')-> insert(['comID' => $commentid, 'userID' =>$id]);
            }
        } elseif (count($post)) {                                                      //to check that the post exists
            $postsaved=DB::table('saveposts')->where([                                  //to check if the post is saved
                ['postID', '=', $postid],
                ['userID', '=', $id]
                ])->get();

            if (count($postsaved)) {
                DB::table('saveposts')->where([
                ['postID', '=', $postid],
                ['userID', '=', $id]
                ])->delete();
            } else {
                DB::table('saveposts')->insert(['postID' => $postid, 'userID' =>$id]);
            }
        } else {
            return response()->json(['error' => 'post or comment doesnot exist'], 500);
        }
        return response()->json(['value'=>true], 200);
    }
}
