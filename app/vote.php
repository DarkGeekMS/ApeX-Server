<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    protected $fillable = [
      'postID',
      'userID',
      'dir',
    ]
}
