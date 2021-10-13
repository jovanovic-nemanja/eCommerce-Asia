<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcHomeProduct extends Model
{
    protected $table = 'bdtdc_home_products';

    public function bdtdcProduct(){
    	return $this->hasOne('App\Model\BdtdcProduct','id','product_id');
    }
    public function LimitedTimeOffer(){
    	return $this->hasOne('App\Model\BdtdcLimitedTimeOffer','product_id','product_id');
    }
    public function hotProduct(){
    	return $this->hasOne('App\Model\BdtdcHomeProduct','product_id','product_id')->where('hot_product',1)->orderBy('sort','asc')->take(15);
    }
}
