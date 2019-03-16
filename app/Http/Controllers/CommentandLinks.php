<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\comment;
use App\commentVote;
use App\User;
use App\moderator;
use App\reportPost;
use App\saveComment;
use App\savePost;
use App\message;
use App\hidden;
use App\post;

/**
 * @group Links and comments
 *
 * controls the comments , replies and private messages for each user
 */

class CommentandLinks extends Controller
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

    public function add(Request $request)
    {
        $user = me($request);

        if (!$user) {
            return response()->json(['error' => 'invalid user'], 404);
        }

        $parent = $request['parent'];

        if ($parent[1]==1) {              //add reply to comment ( or another reply)
            $comment = comment::find($parent);
            if (!$comment) {
                return response()->json(['error' => 'invalid reply '], 404);
            }
          //check block in this case will be for the whole root !!
            $post = post::find($comment['root']);

            $blockedApex = DB::table('apexBlocks')->where('blockedID', $user['id'])
            ->where('ApexID', $post['apex_id'])->get();

            if (count($blockedApex)) {
                return response()->json(['error' => 'You are blocked from this Apexcom'], 404);
            }

            $blockedP = DB::table('blocks')->where('blockerID', $user['id'])->where('blockedID', $post['posted_by'])
            ->orwhere('blockedID', $user['id'])->where('blockerID', $post['posted_by'])->get();

            $blockedC = DB::table('blocks')->where('blockerID', $user['id'])
            ->where('blockedID', $comment['commented_by'])
            ->orwhere('blockedID', $user['id'])->where('blockerID', $comment['commented_by'])->get();

            if (count($blockedP) || count($blockedC)) {
                return response()->json(['error' => 'You cannot reply '], 306);
            }
            //check mention existance
            $count = DB::table('comments')->count();
            $id = "t1_".($count+1);
            DB::table('comments')->insert(['commented_by'=> $user['id'], 'root' =>$post['id'],
            'parent' => $comment['id'] , 'id' =>$id, 'content' => $request['content']]);

            return response()->json([$value =>true], 200);
        } elseif ($parent[1]==3) {                   //add comment
            $post = post::find($parent);

            if (!$post) {
                return response()->json(['error' => 'post not exists '], 404);
            }

            $blockedApex = DB::table('apexBlocks')->where('blockedID', $user['id'])
            ->where('ApexID', $post['apex_id'])->get();

            if (count($blockedApex)) {
                return response()->json(['error' => 'You are blocked from this Apexcom'], 404);
            }

            $blocked = DB::table('blocks')->where('blockerID', $user['id'])->where('blockedID', $post['posted_by'])
            ->orwhere('blockedID', $user['id'])->where('blockerID', $post['posted_by'])->get();

            if (count($blocked)) {
                return response()->json(['error' => 'You cannot comment on this post'], 306);
            }
            //check if any mention exists
            $count = DB::table('comments')->count();
            $id = "t1_".($count+1);
            DB::table('comments')->insert(['commented_by'=> $user['id'], 'root' =>$parent,
            'id' =>$id, 'content' => $request['content']]);

            return response()->json([$value =>true], 200);
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

            $blocked = DB::table('blocks')->where('blockerID', $user['id'])->where('blockedID', $userF)
            ->orwhere('blockedID', $user['id'])->where('blockerID', $userF)->get();

            if (count($blocked)) {
                return response()->json(['error' => 'You cannot comment on this post'], 306);
            }

            $count = DB::table('messages')->count();
            $id = "t4_".($count+1);

            DB::table('messages')->insert(['sender'=> $user['id'], 'receiver' =>$userF,
            'id' =>$id, 'content' => $request['content'], 'subject' => $message['subject']]);

            return response()->json([$value =>true], 200);
        }
        return response()->json(['error' => 'invalid Action'], 404);
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

    public function delete(Request $request)
    {
        $user = me($request);

        if (!$user) {
            return response()->json(['error' => 'invalid user'], 404);
        }

        $name = $request['name'];

        if ($name[1]==3) {                           //post
            $post = post::find($name);

            if (!$post) {
                return response()->json(['error' => 'post not exists'], 404);
            }

            if ($user['type'] !=3) {
                if ($user['id'] == $post['posted_by']) {
                    $post->delete();
                    return response()->json([$value =>true], 200);
                }
                if ($user['type'] ==2) {
                    $apexes = DB::table('moderators')->where('userID', $user_ID)->pluck('apexID');
                    foreach ($apexes as $key => $value) {
                        if ($value == $post['apex_id']) {
                            $post->delete();
                            return response()->json([$value =>true]);
                        }
                    }
                    return response()->json(['error' => 'You are not moderator in this Apexcom'], 304);
                }
                return response()->json(['error' => 'invalid user'], 300);
            }
            $post->delete();
            return response()->json([$value =>true], 200);
        } elseif ($name[1]==1) {                     //comment
            $comment = comment::find($name);

            if (!$comment) {
                return response()->json(['error' => 'comment not exists'], 300);
            }

            if ($user['type'] !=3) {
                if ($user['id'] == $comment['commented_by']) {
                    $comment->delete();
                    return response()->json([$value =>true], 200);
                }

                $post = post::find($comment['root']);

                if ($user['id'] == $post['posted_by']) {
                    $comment->delete();
                    return response()->json([$value =>true], 200);
                }
                if ($user['type'] ==2) {
                    $apexes = DB::table('moderators')->where('userID', $user_ID)->pluck('apexID');
                    foreach ($apexes as $key => $value) {
                        if ($value == $post['apex_id']) {
                            $comment->delete();
                            return response()->json([$value =>true], 200);
                        }
                    }
                    return response()->json(['error' => 'You are not moderator in this Apexcom'], 304);
                }
                return response()->json(['error' => 'invalid user'], 300);
            }
            $comment->delete();
            return response()->json([$value =>true]);
        }
        return response()->json(['error' => 'invalid Action'], 404);
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

    public function lock(Request $request)
    {
        $user= me($request);

        if (!$user) {
            return response()->json(['user_not_found'], 404);
        }
        $user_ID = $user['id'];
        $post = post::find($request['name']);

        if (!$post) {
            return response()->json(['error' => 'post not exists'], 404);
        }

        $type = $user['type'];

        if ($type !=3) {
            if ($user_ID == $post['posted_by']) {
                $post->locked = true;
                $post->save();
                return response()->json([$value =>true], 200);
            }
            if ($type ==2) {
                $apexes = DB::table('moderators')->where('userID', $user_ID)->pluck('apexID');
                foreach ($apexes as $key => $value) {
                    if ($value == $post['apex_id']) {
                        $post->locked = true;
                        $post->save();
                        return response()->json([$value =>true], 200);
                    }
                }
                return response()->json(['error' => 'You are not moderator in this Apexcom'], 404);
            }
            return response()->json(['error' => 'invalid user'], 404);
        }

        $post->locked = true;
        $post->save();
        return response()->json([$value =>true], 200);
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

    public function hide(Request $request)
    {
        $user= me($request);

        if (!$user) {
            return response()->json(['error' => 'invalid user'], 404);
        }

        $post = Post::find($request['name']);
        if (!$post) {
            return response()->json(['error' => 'post not exists'], 404);
        }

        $blocked = DB::table('blocks')->where('blockerID', $user['id'])->where('blockedID', $post['posted_by'])
        ->orwhere('blockedID', $user['id'])->where('blockerID', $post['posted_by'])->get();

        if (count($blocked)) {
            return response()->json(['error' => 'You cannot hide the post'], 404);
        }

        $blockedApex = DB::table('apexBlocks')->where('blockedID', $user['id'])
        ->where('ApexID', $post['apex_id'])->get();

        if (count($blockedApex)) {
            return response()->json(['error' => 'You are blocked from this Apexcom'], 404);
        }

        $hide = DB::table('hiddens')->where('userID', $user['id'])->where('postID', $post['id']);
        if (!count($hide)) {
            DB::table('hiddens')->insert(['userID'=> $user['id'], 'postID' => $post['id']]);
            return response()->json([$value =>true], 200);
        }
        DB::table('hiddens')->where('userID', $user['id'])->where('postID', $post['id'])->delete();
        return response()->json([$value =>true], 200);
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

    public function report(Request $request)
    {
        $user= me($request);
        $user_ID = $user['id'];

        if (!$user) {
            return response()->json(['error' => 'invalid user'], 404);
        }
        if ($user['type'] ==3) {
            return response()->json(['error' => 'invalid Action'], 404);
        }
        $name = $request['name'];
        if ($name[1]==3) {                   //post
            $post = post::find($name);
            if (!$post) {
                return response()->json(['error' => 'invalid Action'], 404);
            }
            if ($user_ID == $post['posted_by']) {
                 return response()->json(['error' => 'invalid Action'], 404);
            }
            $apexes = DB::table('moderators')->where('userID', $user_ID)->pluck('apexID');
            foreach ($apexes as $key => $value) {
                if ($value == $post['apex_id']) {
                    return response()->json(['error' => 'invalid Action'], 404);
                }
            }
            $blocked = DB::table('blocks')->where('blockerID', $user['id'])->where('blockedID', $post['posted_by'])
            ->orwhere('blockedID', $user['id'])->where('blockerID', $post['posted_by'])->get();

            if (count($blocked)) {
                return response()->json(['error' => 'You cannot access the post'], 404);
            }

            $blockedApex = DB::table('apexBlocks')->where('blockedID', $user['id'])
            ->where('ApexID', $post['apex_id'])->get();

            if (count($blockedApex)) {
                return response()->json(['error' => 'You are blocked from this Apexcom'], 404);
            }

            $report = DB::table('reportPosts')->where('userID', $user_ID)->where('postID', $post['id'])->get();
            if (!count($report)) {
                DB::table('reportPosts')->insert(['userID'=> $user_ID,
                'postID' => $post['id'] , 'content' => $request['content']]);
                return response()->json([$value =>true]);
            } else {
                return response()->json(['error' => 'You already report this post'], 404);
            }
        } elseif ($name[1] ==1) {           //comment
            $comment = comment::find($name);
            if (!$comment) {
                return response()->json(['error' => 'invalid Action'], 404);
            }

            if ($user_ID == $comment['commented_by']) {
                 return response()->json(['error' => 'invalid Action'], 404);
            }

            $post = post::find($comment['root']);

            $apexes = DB::table('moderators')->where('userID', $user_ID)->pluck('apexID');
            foreach ($apexes as $key => $value) {
                if ($value == $post['apex_id']) {
                    return response()->json(['error' => 'invalid Action'], 404);
                }
            }

            $blockedApex = DB::table('apexBlocks')->where('blockedID', $user['id'])
            ->where('ApexID', $post['apex_id'])->get();

            if (count($blockedApex)) {
                return response()->json(['error' => 'You are blocked from this Apexcom'], 404);
            }

            $blockedC = DB::table('blocks')->where('blockerID', $user['id'])
            ->where('blockedID', $comment['commented_by'])
            ->orwhere('blockedID', $user['id'])->where('blockerID', $comment['commented_by'])->get();

            $blockedP = DB::table('blocks')->where('blockerID', $user['id'])->where('blockedID', $post['posted_by'])
            ->orwhere('blockedID', $user['id'])->where('blockerID', $post['posted_by'])->get();

            if ($blockedP || $blockedC) {
                return response()->json(['error' => 'You cannot see this post'], 404);
            }
            $report = DB::table('reportComments')->where('userID', $user_ID)->where('comID', $comment['id']);
            if (!$report) {
                DB::table('reportComments')->insert(['userID'=> $user_ID,
                'comID' => $comment['id'] , 'content' => $request['content']]);
                return response()->json([$value =>true], 200);
            } else {
                return response()->json(['error' => 'You already report this comment'], 404);
            }
        }

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
        $user = me($request);

        if (!$user) {
            return response()->json(['error' => 'invalid user'], 404);
        }
        $user_ID = $user['id'];

        $name = $request['name'];

        if ($name[1]==3) {
            $post = post::find($name);
            if (!$post) {
                return response()->json(['error' => 'post not exists'], 404);
            }

            $blocked = DB::table('blocks')->where('blockerID', $user['id'])->where('blockedID', $post['posted_by'])
            ->orwhere('blockedID', $user['id'])->where('blockerID', $post['posted_by'])->get();

            if (count($blocked)) {
                return response()->json(['error' => 'You cannot vote on this post'], 306);
            }

            $blockedApex = DB::table('apexBlocks')->where('blockedID', $user['id'])
            ->where('ApexID', $post['apex_id'])->get();

            if (count($blockedApex)) {
                return response()->json(['error' => 'You are blocked from this Apexcom'], 306);
            }

            $exists = DB::table('votes')->where('postID', $request['name'])
             ->where('userID', $userID)->get();

            if (!count($exits)) {
                DB::table('votes')->insert(['postID'=> $request['name'], 'userID' =>$userID ]);
                $NoVotes = DB::table('votes')->where('postID', $request['name'])->count();
                return response()->json(['votes' => $NoVotes], 200);
            }

            if ($exists['dir'] == $request['dir']) {
                $exits-> delete();
                $NoVotes = DB::table('votes')->where('postID', $request['name'])->count();
                return response()->json(['votes' => $NoVotes], 200);
            } else {
                $exits ->update(['dir' => $request['dir']]);
                $NoVotes = DB::table('votes')->where('postID', $request['name'])->count();
                return response()->json(['votes' => $NoVotes], 200);
            }
        } elseif ($name[1]==1) {
            $comment = comment::find($name);

            if (!$comment) {
                return response()->json(['error' => 'comment not exists'], 300);
            }

            $blocked = DB::table('blocks')->where('blockerID', $user['id'])
            ->where('blockedID', $comment['commented_by'])
            ->orwhere('blockedID', $user['id'])->where('blockerID', $comment['commented_by'])->get();

            if (count($blocked)) {
                return response()->json(['error' => 'You cannot vote on this comment'], 306);
            }

            $mainPost = DB::table('comments')->where('id', $name)->value('root');
            $post = post::find($mainPost);

            $blocked = DB::table('blocks')->where('blockerID', $user['id'])
            ->where('blockedID', $post['posted_by'])
            ->orwhere('blockedID', $user['id'])->where('blockerID', $post['posted_by'])->get();

            if (count($blocked)) {
                return response()->json(['error' => 'You cannot vote on this comment'], 306);
            }

            $blockedApex = DB::table('apexBlocks')->where('blockedID', $user['id'])
            ->where('ApexID', $post['apex_id'])->get();

            if (count($blockedApex)) {
                return response()->json(['error' => 'You are blocked from this Apexcom'], 404);
            }

            $exists = DB::table('commentVotes')->where('comID', $request['name'])
             ->where('userID', $userID)->get();

            if (!count($exits)) {
                DB::table('commentVotes')->insert(['comID'=> $request['name'], 'userID' =>$userID ]);
                $NoVotes = DB::table('commentVotes')->where('comID', $request['name'])->count();
                return response()->json(['votes' => $NoVotes], 200);
            }
            if ($exists['dir'] == $request['dir']) {
                $exits-> delete();
                $NoVotes = DB::table('commentVotes')->where('comID', $request['name'])->count();
                return response()->json(['votes' => $NoVotes], 200);
            } else {
                $exits ->update(['dir' => $request['dir']]);
                $NoVotes = DB::table('commentVotes')->where('comID', $request['name'])->count();
                return response()->json(['votes' => $NoVotes], 200);
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

    public function save()
    {
        return;
    }
}
