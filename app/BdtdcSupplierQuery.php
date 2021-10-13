<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplierQuery extends Model
{
    protected $table="bdtdc_supllier_inqueries";
    protected $fillable  = ['product_id','product_owner_id','unit_id','quantity','total_price','message','sender','is_join_quotation'];


    public function products_to_cat()
    {
    	return $this->hasOne('App\Model\BdtdcProductToCategory','product_id','product_id');
    }
    public function bdtdcProduct(){

	   return $this->belongsTo('App\Model\BdtdcProduct','product_id','id');
	}
	public function bdtdcproductiamge()
	{
		return $this->hasOne('App\Model\BdtdcProductImage','product_id','product_id');
	}
    public function BdtdcSupplierQueryProduct(){
        return $this->hasOne('App\Model\BdtdcProduct','id','product_id');
    }
    public function BdtdcSupplierQueryProductImage(){
        return $this->hasOne('App\Model\BdtdcProductImage','product_id','product_id');
    }
    public function BdtdcSupplierQueryProductUnit(){
        return $this->hasOne('App\Model\BdtdcProductUnit','id','unit_id');
    }
}
