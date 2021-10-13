<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOptionValueDescription extends Model
{
     protected $table = 'bdtdc_option_value';
protected $guarded = array('created_at', 'updated_at');


public function bdtdcOptionValue(){
		return $this->belongsTo('App\Model\BdtdcOptionValue', 'option_value_id');

	}
public function bdtdcOption(){
		return $this->belongsTo('App\Model\BdtdcOption', 'option_id');

	}
	public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
}
