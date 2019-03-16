<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apexCom extends Model
{
    protected $fillable = [
      'id',
      'name',
      'avatar',
      'banner',
      'rules',
      'description',
    ];

    public $timestamps = false;
}
