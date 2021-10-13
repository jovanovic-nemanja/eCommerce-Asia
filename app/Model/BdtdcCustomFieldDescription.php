<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomFieldDescription extends Model
{
    protected $table = 'bdtdc_custom_field_description';
	protected $guarded = array('created_at', 'updated_at');

  

    public function bdtdcCustomField(){
    	return $this->belongsTo('App\Model\BdtdcCustomeField', 'custom_field_id');
    }

    public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
}
