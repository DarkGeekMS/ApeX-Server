<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'id',
      'posted_by',
      'apex_id',
      'title',
      'img',
      'videolink',
      'content',
      'locked',
    ];
    public $incrementing = false;
}
