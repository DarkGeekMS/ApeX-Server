<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable = [
      'id',
      'content',
      'subject',
      'parent',
      'sender',
      'receiver',
      'received',
      'delSend',
      'delReceive'
    ];
    public $incrementing = false;

    public $timestamps = false;
}
