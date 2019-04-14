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
 * this Class contains all the endpoints responsible for all posts and comments interactions.
 */


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

     /**
      * add.
      * This Function used to comment on post or another comment or reply to private message.
      *
      * It makes sure that the user who want to add the comment (or reply) exists in our app,
      * Then check what kind of action he want to take depending on the parent ID sent to the function.
      * as the comment component ID starts with t1 so if the sent id t1 + value,
      * So he want to reply on comment and so on.
      * if (post or comment) check the post is not locked (can receive new comments) (if locked action not valid)
      * check the post\comment owner exists or not ( if not action not valid)
      * then add the comment\msg reply content in the specific table in the database.
      *
      * @param string token the JWT representation of the user in frontend.
      * @param string parent the ID of the thing to be replied to.
      * must be at least 4 chars starts with t follwed by ( 3 if post , 1 if comment and 4 if msg).
      * @return string id , the id of the added reply named ( id for msg , reply for comment or reply)
      */

    public function add(Request $request)
    {
      //get the logged in user
        $account=new AccountController;
        //get the user data
        $userID = $account->me($request)->getData()->user->id;
        $user = User::find($userID);
        //check if there is no content to be submitted return error message
        $validator = validator(
            $request->all(),
            [
              'parent' => 'required|string|min:4',
              'content' => 'required|string|min:1'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => 'invalid data'], 400);
        }
        $parent = $request['parent'];
        //if the parent was comment means the submitted is a reply
        if ($parent[1]==1) {              //add reply to comment ( or another reply)
          //get the parent comment and check valid one
            $comment = Comment::find($parent);
            //if not vali return error message
            if (!$comment) {
                return response()->json(['error' => 'no_comment_reply '], 404);
            }

            if (!$comment['commented_by']) {
                return response()->json(['error' => 'you can not add any reply on this comment'], 400);
            }

            $post = Post::find($comment['root']);
            if ($post['locked']) {
                return response()->json(['error' => 'you can not add any reply on this post'], 400);
            }

            if (!$post['posted_by']) {
                return response()->json(['error' => 'you can not add any reply on this post'], 400);
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
            return response()->json(['reply' => $id], 200);
        } elseif ($parent[1]==3) {                   //add comment
          //get the post to be commented
            $post = Post::find($parent);
            //check valid post if not return error message
            if (!$post) {
                return response()->json(['error' => 'post not exists '], 404);
            }

            if (!$post['posted_by']) {
                return response()->json(['error' => 'you can not add any reply on ths post'], 400);
            }

            if ($post['locked']) {
                return response()->json(['error' => 'you can not comment on this post'], 400);
            }

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
            return response()->json(['comment' => $id], 200);
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

     /**
      * delete.
      * This Function used to delete comment or post by their owner, any admin or
      * any moderator in the apexCom holds this post or comment.
      * any user can delete any comment on his own posts.
      *
      * it receives the token of the logged in user as for the user to delete any post he has to be logged in our app.
      * It makes sure that the user who want to delete the comment/post exists in our app by the token,
      *then check what is the thing to be deleted (post or comment).
      * by checking the second char of the id as posts start with t3 but comment with t1.
      * In case of post : check the type of the logged in user,
      * if admin delete the post, if post owner delete the post, if moderator in the apexCom holds the post delete it.
      * If comment check the same with post
      * in addition to checking if the logged in is the owner of the post holds this comment, then delete it.
      * If none of the above return the action is not valid.
      *
      * @param string token the JWT representation of the user in frontend.
      * @param string name the ID of the thing to be deleted.
      * must be at least 4 chars starts with t follwed by ( 3 if post , 1 if comment).
      * @return boolean deleted , if the post/comment deleted successfully.
      */

    public function delete(Request $request)
    {
        //get the logged in user id
        $account=new AccountController;
        $userID = $account->me($request)->getData()->user->id;
        //get user data by id
        $user = User::find($userID);

        $validator = validator(
            $request->all(),
            ['name' => 'required|string|min:4']
        );

        if ($validator->fails()) {
            return response()->json(['error' => 'invalid id'], 400);
        }
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
     * 3) post or comment fullname (ID) is not found.
     *
     * @bodyParam name string required The fullname of the self-post ,comment or reply to be edited.
     * @bodyParam content string required The body of the thing to be edited.
     * @bodyParam token JWT required Verifying user ID.
     */

    public function editText(Request $request)
    {
        $account=new AccountController;
        $user=$account->me($request)->getData()->user;
        $id=$user->id;
        $validator = validator(
            $request->all(),
            ['name' => 'required|string',
             'content'=>'required|string'
            ]
        );
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }
        $textid= $request['name'];
        $content= $request['content'];

        
        $commentcheck=DB::table('comments')->where('id','=',$textid)->get();
        $postcheck=DB::table('posts')->where('id','=',$textid)->get();
        


        if (!count($commentcheck) && !count($postcheck)) {
            return response()->json(['error' => 'post or comment is not found'], 500);
        } elseif (count($commentcheck)) {
            $commentcheck2=DB::table('comments')->where([['commented_by', '=', $id],['id','=',$textid]])->get();
            if (!count($commentcheck2)) {
                return response()->json(['error' => 'user is not the owner of the comment'], 403);
            } else {
                DB::table('comments')->where('id', $textid)->update(['content' => $content]);
                return response()->json(['the comment is updated successfully'], 200);
            }
        } elseif (count($postcheck)) {
            $postcheck2=DB::table('posts')->where([['posted_by', '=', $id],['id','=',$textid]])->get();
            if (!count($postcheck2)) {
                return response()->json(['error' => 'user is not the owner of the post'], 404);
            } else {
                DB::table('posts')->where('id', $textid)->update(['content' => $content]);
                return response()->json(['the post is updated successfully'], 201);
            }
        }
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

     /**
      * lock.
      * This Function used to un/lock a post from recieving any new comment.
      * By his owner, moderator in the apexCom holds the post or admin site.
      *
      * It makes sure that the user who want to un/lock the posts exists in our app,
      * then check if the posts exists in our app.
      * then check if the logged in user was admin , post owner or moderator in the apexCom holds this post
      * It toggles the post locked status, if none of them it return Invalid action.
      *
      * @param string token the JWT representation of the user in frontend.
      * @param string name the ID of the post.
      * must be at least 4 chars starts with t3_.
      * @return boolean locked true to ensure the action done successfully.
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

     /**
      * hide.
      * This Function used to hide a post by logged in user.
      *
      * It makes sure that the user who want to hide the post exists in our app,
      * Then check the post to be hidden exists in our app.
      * It check if the post already hidden by this user, remove this record if not add this record in DB.
      *
      * @param string token the JWT representation of the user in frontend.
      * @param string name the ID of the post.
      * must be at least 4 chars starts with t3_.
      * @return boolean hide or un-hide is true to ensure the action done successfully.
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
            return response()->json(['hide' => true], 200);
        }
        // if post already hidden remove the relation record so post un-hidden.
        DB::table('hiddens')->where('userID', $user['id'])->where('postID', $post['id'])->delete();
        //return true to ensure that the post un-hidden successfully
        return response()->json(['un-hide' => true], 200);
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

     /**
      * report.
      * This Function used to report post or comment by logged in user.
      * Admin can't report any post/comment as he can take action directly aginst this post/comment.
      * post/comment owner can't report their own posts or comments.
      * post owners can't report comment on their own posts as they can take action directly against any comment.
      * moderator in the apexComs holds the post/comment can't report them.
      *
      * It makes sure that the user who want to report the comment/post exists in our app,
      * check the logged in user if admin return invalid action.
      * Then check the this to be reported is post or comment.
      * as the comment component ID starts with t1_ but post with t3_.
      * check if the logged in user is the post/comment owner,
      * or moderator in the apexcom holds this post/comment return invalid action.
      * in case of comment check if the logged in user is the owner of the post holds this comment,
      * return invalid action.
      * then check if the user reported this post/comment before,
      * if so return the user already reported this post/comment.
      * if not create this report in the DB.
      *
      * @param string token the JWT representation of the user in frontend.
      * @param string name the ID of the post/comment to be reported.
      * @param string content the content of the report.
      * must be at least 4 chars starts with t follwed by ( 3 if post , 1 if comment and 4 if msg).
      * @return boolean reported is true to ensure the post or comment reported successfully.
      */

    public function report(Request $request)
    {
        //get the user id using the token
        $account=new AccountController;
        $userID = $account->me($request)->getData()->user->id;
        //get the user by the user id
        $user = User::find($userID);
        $validator = validator(
            $request->all(),
            [
              'name' => 'required|string|min:4',
              'content' => 'required|string|min:1'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => 'invalid data'], 400);
        }

        //admin can't report any post or comment (he can take any action againest the post)
        if ($user['type'] ==3) {
            return response()->json(['error' => 'invalid Action'], 400);
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

            if (!$post['posted_by']) {
                return response()->json(['error' => 'you can not report this post'], 400);
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

            if (!$comment['commented_by']) {
                return response()->json(['error' => 'you can not report this comment'], 400);
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

     /**
      * vote.
      * This Function used to vote on comment or post by a logged in user.
      *
      * It makes sure that the user who want to vote on post/comment exists in our app,
      * Then check the vote will be on comment or post.
      * as the comment component ID starts with t1_ but post with t3_.
      * check if the user voted on this post/comment before.
      * if not create the record and sum the votes on this post/comment then return it.
      * if it's not the first time for this user to vote on this post/comment,
      * check if the new vote on is the same as the previous one cancel this record return the updated votes count.
      * if not update the vote record with the new value and return the updated votes count of the post/comment.
      *
      * @param string token the JWT representation of the user in frontend.
      * @param integer dir the direction of vote.
      * @param string parent the ID of the thing to be voted on.
      * must be at least 4 chars starts with t1_ in case of comment , t3_ in case of post.
      * @return integer votes represent the total number of votes on this post/comment.
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
        $validator = validator(
            $request->all(),
            ['name' => 'required|string|min:4']
        );

        if ($validator->fails()) {
            return response()->json(['error' => 'invalid id'], 400);
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
