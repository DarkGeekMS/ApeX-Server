<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class block extends Model
{
    protected $fillable = [
      'blockerID',
      'blockedID',

    ];
    public $incrementing = false;
}
