<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomerTransaction extends Model
{
    protected $table = 'bdtdc_customer_transaction';
	protected $guarded = array('created_at', 'updated_at');

  public function bdtdcCustomer()
    {
        return $this->belongsTo('App\Model\BdtdcCustomer', 'customer_id');
    }
    	public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}
}
