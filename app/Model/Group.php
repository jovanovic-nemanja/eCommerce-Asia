<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
   protected $table = 'bdtdc_groups';
	protected $guarded = array('created_at', 'updated_at');

}
