<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apexBlock extends Model
{
    protected $fillable = [
      'ApexID',
      'blockedID',
    ];
    public $incrementing = false;

    public $timestamps = false;
}
