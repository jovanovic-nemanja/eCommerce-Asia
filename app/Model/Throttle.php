<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Throttle extends Model
{
    protected $table = 'throttle';
    protected $guarded = array('created_at', 'updated_at');

    /*public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }*/
}
