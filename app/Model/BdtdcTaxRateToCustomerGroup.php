<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcTaxRateToCustomerGroup extends Model
{
     protected $table = 'bdtdc_tax_rate_to_customer_group';
	protected $guarded = array('created_at', 'updated_at');


	public function bdtdcTaxRate(){
    	return $this->belongsTo('App\Model\BdtdcTaxRate', 'tax_rate_id');
    }

	public function bdtdcCustomerGroup(){
    	return $this->belongsTo('App\Model\BdtdcCustomerGroup', 'customer_group_id');
    }
}
