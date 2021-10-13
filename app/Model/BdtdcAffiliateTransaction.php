<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcAffiliateTransaction extends Model
{
     protected $table = 'bdtdc_affiliate_transaction';
    protected $guarded = array('created_at', 'updated_at');

   
    public function bdtdcAffiliate(){
    	return $this->belongsTo('App\Model\BdtdcAffiliate', 'affiliate_id');
    }
	public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}

}
