<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcReturn extends Model
{
    protected $table = 'bdtdc_return';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}
public function bdtdcCustomer()
    {
        return $this->belongsTo('App\Model\BdtdcCustomer', 'customer_id');
    }
    public function bdtdcProduct(){

	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}

public function bdtdcReturnReason(){
	return $this->belongsTo('App\Model\BdtdcReturnReason','return_reason_id')
}
public function bdtdcReturnAction(){
	return $this->belongsTo('App\Model\BdtdcReturnAction','return_action_id')
}
public function bdtdcReturnStatus(){
	return $this->belongsTo('App\Model\BdtdcReturnStatus','return_status_id')
}







}
