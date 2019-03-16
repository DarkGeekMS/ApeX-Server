<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportPost extends Model
{
    protected $fillable = [
      'postID',
      'userID',
      'content',
    ];

    public $timestamps = false;
}
