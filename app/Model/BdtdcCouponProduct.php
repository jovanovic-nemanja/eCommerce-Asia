<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCouponProduct extends Model
{
    protected $table = 'bdtdc_coupon_product';
	protected $guarded = array('created_at', 'updated_at');

	

    public function bdtdcCoupon(){
    	return $this->belongsTo('App\Model\BdtdcCoupon', 'coupon_id');
    }

     public function bdtdcProduct(){
    	return $this->belongsTo('App\Model\BdtdcProduct', 'product_id');
    }
   
}
