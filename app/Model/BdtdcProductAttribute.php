<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductAttribute extends Model
{
    protected $table = 'bdtdc_product_attribute';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcProduct(){

		return $this->belongsTo('App\Model\BdtdcProduct','product_id');
	}
	public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
	public function bdtdcAttribute(){
    	return $this->hasOne('App\Model\BdtdcAttribute', 'id','attribute_id');
    }

}
