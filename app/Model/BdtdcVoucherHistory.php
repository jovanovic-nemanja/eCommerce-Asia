<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcVoucherHistory extends Model
{
     protected $table = 'bdtdc_voucher_history';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}

public function bdtdcVoucher(){

	return $this->belongsTo('App\Model\BdtdcVoucher','voucher_id');
}



}
