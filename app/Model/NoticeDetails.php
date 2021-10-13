<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NoticeDetails extends Model
{
    public function get_user_info(){
    	return $this->belongsTo('App\Model\User', 'user_id');
    }
    public function get_user_role_info(){
    	return $this->belongsTo('App\Model\Role', 'user_role_id');
    }
}
