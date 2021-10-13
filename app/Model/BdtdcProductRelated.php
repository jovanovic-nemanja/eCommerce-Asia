<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductRelated extends Model
{
    protected $table = 'bdtdc_product_related';
	protected $guarded = array('created_at', 'updated_at');

	

   public function bdtdcProduct(){
	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}


}
