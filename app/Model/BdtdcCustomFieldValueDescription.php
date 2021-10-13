<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomFieldValueDs extends Model
{
    protected $table = 'bdtdc_custom_field_value_ds';
	protected $guarded = array('created_at', 'updated_at');

  

 public function bdtdcCustomFieldValue(){
		return $this->belongsTo('App\Model\bdtdcCustomFieldValue', 'custom_field_value_id');

	}
 public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
    public function bdtdcCustomField(){
    	return $this->belongsTo('App\Model\BdtdcCustomeField', 'custom_field_id');
    }
}
