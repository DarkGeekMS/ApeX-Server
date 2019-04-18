<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'id',
      'commented_by',
      'content',
      'root',
      'parent',
    ];

    protected $appends = [
        'votes', 'writerUsername'
    ];

    public $incrementing = false;

    public function votes()
    {
        return $this->hasMany(CommentVote::class, 'comID');
    }

    public function getVotesAttribute()
    {
        return (int)$this->votes()->sum('dir');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'commented_by');
    }

    public function getwriterUsernameAttribute()
    {
        return $this->user()->first()['username'];
    }

    public function userVote($userID)
    {
        return (int)$this->votes()->where(compact('userID'))->first()['dir'];
    }

    public function saves()
    {
        return $this->hasMany(SaveComment::class, 'comID');
    }

    //return if the given user saved the post
    public function isSavedBy($userID)
    {
        return $this->saves()->where(compact('userID'))->exists();
    }
}
