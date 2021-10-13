<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomFieldValue extends Model
{
    protected $table = 'bdtdc_custom_field_value';
	protected $guarded = array('created_at', 'updated_at');

  

    public function bdtdcCustomField(){
    	return $this->belongsTo('App\Model\BdtdcCustomeField', 'custom_field_id');
    }
}
