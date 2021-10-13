<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrderHistory extends Model
{
    protected $table = 'bdtdc_order_history';
	protected $guarded = array('created_at', 'updated_at');



public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}

	public function bdtdcOrderStatus(){
    	return $this->belongsTo('App\Model\BdtdcOrderStatus', 'order_status_id');
    }

}
