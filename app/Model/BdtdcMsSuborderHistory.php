<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMsSuborderHistory extends Model
{
    protected $table = 'bdtdc_ms_suborder';
protected $guarded = array('created_at', 'updated_at');

public function bdtdcMsSuborder(){
		return $this->belongsTo('App\Model\BdtdcMsSuborder', 'suborder_id');
	}
	
public function bdtdcOrderStatus(){
    	return $this->belongsTo('App\Model\BdtdcOrderStatus', 'order_status_id');
    }
}
