<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class moderator extends Model
{
    protected $fillable = [
      'apexID',
      'userID',
    ];
    public $incrementing = false;

    public $timestamps = false;
}
