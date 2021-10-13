<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMsAttributeValue extends Model
{
    protected $table = 'bdtdc_ms_attribute_value';
	protected $guarded = array('created_at', 'updated_at');



public function bdtdcAttribute(){
    	return $this->belongsTo('App\Model\BdtdcAttribute', 'attribute_id');
    }


}
