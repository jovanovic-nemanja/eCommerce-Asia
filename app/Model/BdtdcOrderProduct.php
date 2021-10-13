<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrderProduct extends Model
{
    protected $table = 'bdtdc_order_product';
	protected $guarded = array('created_at', 'updated_at');



public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}

	public function bdtdcProduct(){

	return $this->belongsTo('App\Model\BdtdcProduct','order_product_id');
}

public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}


}
