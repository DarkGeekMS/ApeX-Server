<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentVote extends Model
{
    protected $fillable = [
      'comID',
      'userID',
      'dir',
    ];

    public $timestamps = false;
}
