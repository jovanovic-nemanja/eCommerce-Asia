<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMsAttributeAttribute extends Model
{
     protected $table = 'bdtdc_ms_attribute_attribute';
	protected $guarded = array('created_at', 'updated_at');


public function bdtdcMsAttribute(){
    	return $this->belongsTo('App\Model\BdtdcMsAttribute', 'ms_attribute_id');
    }
	
}
