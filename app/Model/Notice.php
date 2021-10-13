<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    
    public function notice_details(){
    	return $this->hasMany('App\Model\NoticeDetails');
    }
}
