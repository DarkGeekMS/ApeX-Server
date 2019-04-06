<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
      'postID',
      'userID',
      'dir',
    ];
    public $incrementing = false;
}
