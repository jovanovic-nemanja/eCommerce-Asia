<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $guarded = array('created_at', 'updated_at');

    public function getRoleId(){

    }
    public function getRoleSlug(){
    	
    }
}
