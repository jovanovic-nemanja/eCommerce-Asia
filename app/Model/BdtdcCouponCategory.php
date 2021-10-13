<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCouponCategory extends Model
{
     protected $table = 'bdtdc_coupon_category';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcCategory(){
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id');
    }

    public function bdtdcCoupon(){
    	return $this->belongsTo('App\Model\BdtdcCoupon', 'coupon_id');
    }
}
