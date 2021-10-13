<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCouponHistory extends Model
{
    protected $table = 'bdtdc_coupon_history';
	protected $guarded = array('created_at', 'updated_at');

	

    public function bdtdcCoupon(){
    	return $this->belongsTo('App\Model\BdtdcCoupon', 'coupon_id');
    }


    public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}
	public function bdtdcCustomer()
    {
        return $this->belongsTo('App\Model\BdtdcCustomer', 'customer_id');
    }
}
