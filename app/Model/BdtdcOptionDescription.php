<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOptionDescription extends Model
{
    protected $table = 'bdtdc_option_description';
protected $guarded = array('created_at', 'updated_at');


public function bdtdcOption(){
		return $this->belongsTo('App\Model\BdtdcOption', 'option_id');

	}

public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
}
