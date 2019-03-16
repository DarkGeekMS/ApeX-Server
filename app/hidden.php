<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hidden extends Model
{
    protected $fillable = [
      'postID',
      'userID',
    ];
    public $incrementing = false;

    public $timestamps = false;
}
