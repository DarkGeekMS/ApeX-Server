<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportComment extends Model
{
    protected $fillable = [
      'comID',
      'userID',
      'content',
    ];
    public $incrementing = false;

    public $timestamps = false;
}
