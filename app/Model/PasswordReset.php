<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
     protected $table = 'password_resets';
    protected $guarded = array('created_at');

   
     public function user(){
    	return $this->hasOne('App\Model\User', 'email','email');
    }
    
}
