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

    public $incrementing = false;

    /**
     * Get the posts for the apexCom.
     */
    public function posts()
    {
        return $this->hasMany(post::class, 'apex_id', 'id');
    }
}
