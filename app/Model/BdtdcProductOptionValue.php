<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductOptionValue extends Model
{
    protected $table = 'bdtdc_product_option_value';
	protected $guarded = array('created_at', 'updated_at');

	

   public function bdtdcProduct(){
	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}
public function bdtdcOption(){
		return $this->belongsTo('App\Model\BdtdcOption', 'option_id');

	}
	public function bdtdcOptionValue(){
	return $this->belongsTO('App\Model\BdtdcOptionValue','option_value_id');

}
public function bdtdcProductOption(){
	return $this->belongsTO('App\Model\BdtdcProductOption','product_option_id');

}




}
