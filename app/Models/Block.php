<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
      'blockerID',
      'blockedID',
    ];
    public $incrementing = false;

    /**
     * Check if two users are blocked from each other
     * 
     * @param string $id1 the id of the first user
     * @param string $id2 the id of the second user
     * 
     * @return bool
     */
    public static function areBlocked($id1, $id2)
    {
        return self::where(['blockerID' => $id1, 'blockedID' => $id2])->orWhere(
            function ($query) use ($id1, $id2) {
                $query->where(['blockerID' => $id2, 'blockedID' => $id1]);
            }
        )->exists();
    }
}
