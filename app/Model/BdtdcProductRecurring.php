<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductRecurring extends Model
{
    protected $table = 'bdtdc_product_recurring';
	protected $guarded = array('created_at', 'updated_at');

	

   public function bdtdcProduct(){
	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}

public function bdtdcCustomerGroup(){
    	return $this->belongsTo('App\Model\BdtdcCustomerGroup', 'customer_group_id');
    }
    public function bdtdcRecurring(){
	return $this->belongsTo('App\Model\BdtdcRecurring','recurring_id');
}




}
