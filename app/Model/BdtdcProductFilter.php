<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductFilter extends Model
{
    protected $table = 'bdtdc_product_filter';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcFilter(){
		return $this->belongsTo('App\Model\BdtdcFilter', 'filter_id');
   }

   public function bdtdcProduct(){
	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}



}
