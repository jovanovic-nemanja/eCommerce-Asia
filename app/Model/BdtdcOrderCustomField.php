<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrderCustomField extends Model
{
     protected $table = 'bdtdc_order_custom_field';
	protected $guarded = array('created_at', 'updated_at');



public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}

	public function bdtdcCustomField(){
    	return $this->belongsTo('App\Model\BdtdcCustomeField', 'custom_field_id');
    }
    public function bdtdcCustomFieldValue(){
		return $this->belongsTo('App\Model\bdtdcCustomFieldValue', 'custom_field_value_id');

	}

}
