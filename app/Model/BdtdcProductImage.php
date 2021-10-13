<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductImage extends Model
{
    protected $table = 'bdtdc_product_image';
	protected $guarded = array('created_at', 'updated_at');

   public function bdtdcProduct()
   {
		return $this->belongsTo('App\Model\BdtdcProduct','product_id','id');
   }
   public function bdtdcProductToCategory()
   {
		return $this->hasOne('App\Model\BdtdcProductToCategory','product_id','product_id');
   }
}
