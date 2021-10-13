<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrderOption extends Model
{
    protected $table = 'bdtdc_order_option';
	protected $guarded = array('created_at', 'updated_at');



public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}

	public function bdtdcProduct(){

	return $this->belongsTo('App\Model\BdtdcProduct','order_product_id');
}
public function bdtdcProductOption(){
		return $this->belongsTo('App\Model\BdtdcProductOption', 'product_option_id');

	}
	public function bdtdcProductOptionValue(){
		return $this->belongsTo('App\Model\BdtdcProductOptionValue', 'product_option_value_id');

	}




}
