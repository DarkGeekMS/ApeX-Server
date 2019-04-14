<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavePost extends Model
{
    protected $fillable = [
      'postID',
      'userID',
    ];
    public $incrementing = false;
}
