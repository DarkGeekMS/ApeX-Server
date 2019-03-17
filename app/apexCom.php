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
<<<<<<< HEAD
    public $table = 'apexcoms';
=======
>>>>>>> 24c4602fba0d5e364c3e1eeb8d02f4485ed0dcce
    public $incrementing = false;
}
