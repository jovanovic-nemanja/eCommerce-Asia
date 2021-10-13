<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductPrice extends Model
{
    //
    protected $table = 'bdtdc_product_prices';
	protected $guarded = array('created_at', 'updated_at');
	
	public function products()
	{
	      return $this->belongsTo('App\Model\BdtdcProduct','product_id');
	}
}
