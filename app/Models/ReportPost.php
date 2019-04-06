<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportPost extends Model
{
    protected $fillable = [
      'postID',
      'userID',
      'content',
    ];
    public $incrementing = false;
}
