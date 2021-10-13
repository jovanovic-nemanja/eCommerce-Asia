<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users_group extends Model
{
     protected $table = 'users_groups';
    protected $guarded = array('created_at', 'updated_at');

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function group()
    {
    	return $this->belongsTo('App\Model\Group', 'group_id');
    }	

}
