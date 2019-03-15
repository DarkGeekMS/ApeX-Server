<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hidden extends Model
{
    protected $fillable = [
      'postID',
      'userID',
    ]
}
