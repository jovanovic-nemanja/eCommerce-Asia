<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
     protected $table = 'reminder';
    protected $guarded = array('created_at', 'updated_at');

     public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }
}
