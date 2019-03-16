<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\comment;
use App\commentVote;
use App\User;
use App\moderator;
use App\reportPost;
use App\saveComment;
use App\savePost;
use App\message;
use App\hidden;
use App\Http\Controllers\Account;

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

    public function add($name, $content, $parent)
    {
        $user_ID = 't1_3';    //to be changed
        if (!$user_ID) {
            return false;
        }
        if ($parent[1]==1) {                          //add reply to comment ( or another reply)
            // code...
        } elseif ($parent[1]==3) {                   //add comment
            // code...
        } elseif ($parent[1]==4) {                  //reply to message
          // code...
        } else {
            return false;
        }
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

    public function delete($name)
    {
        $user_ID = 't1_3';    //to be changed
        if (!$user_ID) {
            return false;
        }
        $type = User::find($user_ID)['type'];

        if ($name[1]==3) {                           //post
            $post = Post::find($name);

            if (!$post) {
                return false;
            }

            if ($type !=3) {
                if ($type ==2) {
                    if (!$moderator) {          // moderator in this apeXcom
                        return false;
                    }
                } elseif ($type ==1) {
                    if ($user_ID != $post['posted_by']) {
                        return false;
                    }
                } else {
                    return false;
                }
            }

            $post->delete();
            return true;
        } elseif ($name[1]==1) {                     //comment
            $comment = comment::find($name);
            if (!$comment) {
                return false;
            }
            if ($type !=3) {
                if ($type ==2) {
                    if (!$moderator) {          // moderator in this apeXcom
                        return false;
                    }
                } elseif ($type ==1) {
                    if ($user_ID != $comment['commented_by']) {
                        return false;
                    }
                } else {
                    return false;
                }
            }
            $comment->delete();
            return true;
        } else {
            return false;
        }
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

    public function lock($name)
    {
        $user_ID = 't1_3';    //to be changed
        if (! $user_ID) {
            return response()->json([$value =>false]);
        }
        $post = Post::find($name);
        if (!$post) {
            return response()->json([$value =>false]);
        }
        $type = User::find($user_ID)['type'];

        if ($type !=3) {
            if ($type ==2) {
                $moderate = moderator::find($user_ID)['apexID'];
                foreach ($moderate as $moderator) {
                    if ($moderator == $post['apex_id']) {
                        $post->locked = true;
                        $post->save();
                        return response()->json([$value =>true]);
                    }
                }
                return response()->json([$value =>false]);
            } elseif ($type==1) {
                if ($user_ID != $post['posted_by']) {
                    return response()->json([$value =>false]);
                }
            } else {
                return response()->json([$value =>false]);
            }
        }

        $post->locked = true;
        $post->save();
        return response()->json([$value =>true]);
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

    public function hide($name)
    {
        $user_ID = 't1_3';    //to be changed
        if (!$user_ID) {
            return false;
        }
        $post = Post::find($name);
        if (!$post) {
            return false;
        }
         //check the user not blocked by the owner of the post ( or block him )
        // not blocked from the apxCom has this post
        $hide = hidden::where(['postID' => $name ,'userID' => $user_ID]);
        if (!$hide) {
            hidden::create(['postID' => $name ,'userID' => $user_ID]);
            return true;
        }
        $hide->delete();
        return true;
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

    public function vote($name, $dir)
    {
        $user_ID = 't1_3';    //to be changed
        if (!$user_ID) {
            return;
        }

        if ($name[1]==3) {
            $post = Post::find($name);
            if (!$post) {
                return;
            }
            // check the user not blocked from this apeXcom or blocked by /block the owner of the post
            $exits = vote::where(['postID' => $name ,'userID' => $user_ID]);
            if (!$exits) {
                vote::create(['postID' => $name ,'userID' => $user_ID]);
                return true;                          //return the count
            }
            if ($exists['dir'] == $dir) {
                $exits-> delete();
                return true;                        //return the count
            } else {
                $exits ->update(['dir' => $dir]);
                return true;                      //return the count
            }
        } elseif ($name[1]==1) {
            $comment = comment::find($name);
            if (!$comment) {
                return;
            }
        // check the user not blocked from this apeXcom or blocked by /block the owner of the post
            $exits = commentVote::where(['comID' => $name ,'userID' => $user_ID]);
            if (!$exits) {
                commentVote::create(['postID' => $name ,'comID' => $user_ID]);
                return true;                          //return the count
            }
            if ($exists['dir'] == $dir) {
                $exits-> delete();
                return true;                        //return the count
            } else {
                $exits ->update(['dir' => $dir]);
                return true;                      //return the count
            }
        } else {
            return;
        }
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
        $type=$user->only('type');
        $userid= $request->only('id');
        $commentid=$request->only('ID');
        $comment=DB::table('comments')->where('id','=', $commentid)->get();
        $postid=$request->only('ID');
        $post=DB::table('posts')->where('id','=', $postid)->get();
       
        if($comment){                                                            //to check that the comment exists
            DB::table('savecomments')->insert(
                ['comID' => $commentid, 'userID' =>$userid]
            );
        }
        else if($post){                                                         //to check that the post exists
            DB::table('saveposts')->insert(
                ['postID' => $postid, 'userID' =>$userid]
            );
        }
        else{
            return response()->json(['error' => 'post or comment doesnot exist'], 500);
        }

        return response()->json(['value'=>true],200);
    }
}
