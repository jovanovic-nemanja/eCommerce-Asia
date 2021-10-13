<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductOption extends Model
{
     protected $table = 'bdtdc_product_option';
	protected $guarded = array('created_at', 'updated_at');

	

   public function bdtdcProduct(){
	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}
public function bdtdcOption(){
		return $this->belongsTo('App\Model\BdtdcOption', 'option_id');

	}
	

}
