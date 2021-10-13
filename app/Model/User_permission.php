<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_permission extends Model
{
    protected $table = 'user_permission';
    protected $guarded = array('created_at', 'updated_at');

   public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function permission()
    {
    	return $this->belongsTo('App\Model\Permission', 'permission_id');
    }
}
