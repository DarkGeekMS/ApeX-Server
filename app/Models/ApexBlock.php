<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApexBlock extends Model
{
    protected $fillable = [
      'ApexID',
      'blockedID',
    ];
    public $incrementing = false;
}
