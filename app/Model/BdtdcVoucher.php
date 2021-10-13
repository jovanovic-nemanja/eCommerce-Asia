<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcVoucher extends Model
{
    protected $table = 'bdtdc_voucher';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}

public function bdtdcVoucherTheme(){

	return $this->belongsTo('App\Model\BdtdcVoucherTheme','voucher_theme_id');
}



}
