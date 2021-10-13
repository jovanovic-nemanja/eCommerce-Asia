<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMsSuborder extends Model
{
   protected $table = 'bdtdc_ms_suborder';
protected $guarded = array('created_at', 'updated_at');

public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}
	public function bdtdcMsSeller(){
    	return $this->belongsTo('App\Model\BdtdcMsSeller', 'seller_id');
    }
public function bdtdcOrderStatus(){
    	return $this->belongsTo('App\Model\BdtdcOrderStatus', 'order_status_id');
    }

}
