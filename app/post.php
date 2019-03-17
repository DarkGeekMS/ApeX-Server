<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
      'id',
      'posted_by',
      'apex_id',
      'img',
      'videolink',
      'content',
      'locked',
    ];
    public $incrementing = false;

    public $timestamps = false;
}
