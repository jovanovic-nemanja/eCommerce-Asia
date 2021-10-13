<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductDiscount extends Model
{
    protected $table = 'bdtdc_product_discount';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcCustomerGroup(){
    	return $this->belongsTo('App\Model\BdtdcCustomerGroup', 'customer_group_id');
    }
}
