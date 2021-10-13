<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrderRecurringTransaction extends Model
{
    protected $table = 'bdtdc_order_recurring_transaction';
	protected $guarded = array('created_at', 'updated_at');

	

public function bdtdcOrderRecurring(){
	return $this->belongsTo('App\Model\BdtdcOrderRecurring','order_recurring_id');
}

}
