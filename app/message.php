<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable = [
      'id',
      'content',
      'subject',
      'sentAt',
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
