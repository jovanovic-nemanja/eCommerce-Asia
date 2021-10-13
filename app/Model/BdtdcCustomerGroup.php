<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomerGroup extends Model
{
    //
     protected $table = 'bdtdc_customer_group';
	protected $guarded = array('created_at', 'updated_at');

	// public function group_name()
	// {
	// 	return $this->hasOne('App\Model\BdtdcCustomerGroupDescription','')
	// }
}
