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
      'posted_at',
      'locked',
    ];
    public $incrementing = false;
}
