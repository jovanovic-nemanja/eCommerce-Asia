<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function childrens()
	{
	    return $this->hasMany(Module::class, 'parent_id')->where('permission',1);
	}
}
