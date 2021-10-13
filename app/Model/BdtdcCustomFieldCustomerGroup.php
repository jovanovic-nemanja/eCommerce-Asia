<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomFieldCustomerGroup extends Model
{
    protected $table = 'bdtdc_custom_field_customer_group';
	protected $guarded = array('created_at', 'updated_at');

  

    public function bdtdcCustomField(){
    	return $this->belongsTo('App\Model\BdtdcCustomeField', 'custom_field_id');
    }

    public function bdtdcCustomerGroup(){
    	return $this->belongsTo('App\Model\BdtdcCustomerGroup', 'customer_group_id');
    }
}
