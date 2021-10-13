<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductToStore extends Model
{
     protected $table = 'bdtdc_product_to_store';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcProduct(){

	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}


public function bdtdcStore(){
    	return $this->belongsTo('App\Model\BdtdcStore', 'store_id');
    }
     
}
