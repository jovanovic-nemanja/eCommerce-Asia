<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMsBalance extends Model
{
     protected $table = 'bdtdc_ms_balance';
	protected $guarded = array('created_at', 'updated_at');





/*public function bdtdcSeller(){
		return $this->belongsTo('App\Model\BdtdcSeller', 'seller_id');
	}
public function bdtdcWithdrawal(){
		return $this->belongsTo('App\Model\BdtdcWithdrawal', 'withdrawal_id');
	}
	*/

public function bdtdcProduct(){
		return $this->belongsTo('App\Model\BdtdcProduct', 'product_id');
	}
public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}




}
