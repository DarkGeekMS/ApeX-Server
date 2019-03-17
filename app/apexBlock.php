<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apexBlock extends Model
{
    protected $fillable = [
      'ApexID',
      'blockedID',
    ];
<<<<<<< HEAD
    protected $table = 'apexblocks';
=======
    public $incrementing = false;
>>>>>>> 24c4602fba0d5e364c3e1eeb8d02f4485ed0dcce
}
