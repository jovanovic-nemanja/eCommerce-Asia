<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMsPayment extends Model
{
    protected $table = 'bdtdc_ms_payment';
	protected $guarded = array('created_at', 'updated_at');

   
public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}

public function bdtdcProduct(){

	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}

public function bdtdcMsSeller(){
    	return $this->belongsTo('App\Model\BdtdcMsSeller', 'seller_id');
    }
}
