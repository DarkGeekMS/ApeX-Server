<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class savePost extends Model
{
    protected $fillable = [
      'postID',
      'userID',
    ];

    public $timestamps = false;
}
