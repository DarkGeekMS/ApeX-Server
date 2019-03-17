<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
      'id',
      'commented_by',
      'content',
      'root',
      'parent',
    ];
    public $incrementing = false;
}
