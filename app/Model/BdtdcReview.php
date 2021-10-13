<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcReview extends Model
{
    protected $table = 'bdtdc_review';
	protected $guarded = array('created_at', 'updated_at');
	public function bdtdcCustomer()
    {
        return $this->belongsTo('App\Model\BdtdcCustomer', 'customer_id');
    }


    public function bdtdcProduct(){

	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}


}
