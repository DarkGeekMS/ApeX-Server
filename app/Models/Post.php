<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = [
      'id',
      'posted_by',
      'apex_id',
      'title',
      'img',
      'videolink',
      'content',
      'locked',
    ];

    protected $appends = [
        'votes', 'comments_count', 'apex_com_name', 'post_writer_username',
        'post_writer_is_deleted'
    ];
    
    public $incrementing = false;

    /**
     * A relation to the comments of the post
     * 
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'root');
    }

    /**
     * Return number of comments on the post
     * 
     * @return int
     */
    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }

    /**
     * A relation to the votes table on the post
     * 
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function votes()
    {
        return $this->hasMany(Vote::class, 'postID');
    }

    /**
     * Return the sum of votes on the post
     * 
     * @return int
     */
    public function getVotesAttribute()
    {
        return (int)$this->votes()->sum('dir');
    }

    /**
     * A relation to the ApexCom that the post is written in
     * 
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function apexCom()
    {
        return $this->belongsTo(ApexCom::class, 'apex_id');
    }

    /**
     * Return the name of the ApexCom that the post is written in
     * 
     * @return string
     */
    public function getApexComNameAttribute()
    {
        return $this->apexCom()->first()['name'];
    }

    /**
     * A relation to the user who posted the post
     * 
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by')->withTrashed();
    }

    /**
     * Return the name of the user that posted the post
     * 
     * @return string
     */
    public function getPostWriterUsernameAttribute()
    {
        return $this->user()->first()['username'];
    }

    /**
     * Return the if the post writer is deleted
     * 
     * @return bool
     */
    public function getPostWriterIsDeletedAttribute()
    {
        return ($this->user()->first()['deleted_at'] != null);
    }

    /**
     * Return the vote of the given user on this post (-1, 0, 1)
     * 
     * @param string $userID the id of user that you want to get his vote on the post
     * 
     * @return int
     */
    public function userVote($userID)
    {
        return (int)$this->votes()->where(compact('userID'))->first()['dir'];
    }

    /**
     * A relation to the `SavePost` table to get the users who saved the post
     * 
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function saves()
    {
        return $this->hasMany(SavePost::class, 'postID');
    }

    /**
     * Return if the given user saved the post
     * 
     * @param string $userID the id of the user that you want to know if he saved the post
     * 
     * @return bool
     */
    public function isSavedBy($userID)
    {
        return $this->saves()->where(compact('userID'))->exists();
    }

    public function hiddens()
    {
        return $this->hasMany(Hidden::class, 'postID');
    }

    //return if the given user hid the post
    public function isHiddenBy($userID)
    {
        return $this->hiddens()->where(compact('userID'))->exists();
    }
}
