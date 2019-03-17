<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscriber extends Model
{
    protected $fillable = [
      'apexID',
      'userID',
    ];
}
