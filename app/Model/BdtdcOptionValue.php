<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOptionValue extends Model
{
    protected $table = 'bdtdc_option_value';
protected $guarded = array('created_at', 'updated_at');


public function bdtdcOption(){
		return $this->belongsTo('App\Model\BdtdcOption', 'option_id');

	}
}
