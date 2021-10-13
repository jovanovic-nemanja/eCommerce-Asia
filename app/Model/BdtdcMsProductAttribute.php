<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMsProductAttribute extends Model
{
    protected $table = 'bdtdc_ms_product_attribute';
	protected $guarded = array('created_at', 'updated_at');

   
public function bdtdcAttribute(){
    	return $this->belongsTo('App\Model\BdtdcAttribute', 'attribute_id');
    }
    public function bdtdcAttributeValue(){
    	return $this->belongsTo('App\Model\BdtdcAttributeValue', 'attribute_value_id');
    }

public function bdtdcProduct(){

	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}
}
