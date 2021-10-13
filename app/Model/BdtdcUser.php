<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcUser extends Model
{
    protected $table = 'bdtdc_user';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcUserGroup(){
    	return $this->belongsTo('App\Model\BdtdcUserGroup', 'user_group_id');
    }

}
