<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saveComment extends Model
{
    protected $fillable = [
      'comID',
      'userID',
    ];
    public $incrementing = false;

    public $timestamps = false;
}
