<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductSpecial extends Model
{
	protected $table = 'bdtdc_product_special';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcProduct(){

		return $this->belongsTo('App\Model\BdtdcProduct','product_id');
	}
	public function bdtdcCustomerGroup(){
    	return $this->belongsTo('App\Model\BdtdcCustomerGroup', 'customer_group_id');
    }
}
