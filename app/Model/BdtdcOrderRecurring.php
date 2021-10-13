<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrderRecurring extends Model
{
    protected $table = 'bdtdc_order_recurring';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}

public function bdtdcProduct(){

	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}

public function bdtdcRecurring(){
	return $this->belongsTo('App\Model\BdtdcRecurring','recurring_id');
}



}
