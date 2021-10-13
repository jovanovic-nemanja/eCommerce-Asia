<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMsOrderProductData extends Model
{
   protected $table = 'bdtdc_ms_order_product_data';
	protected $guarded = array('created_at', 'updated_at');

   
public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}

public function bdtdcProduct(){

	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}
}
