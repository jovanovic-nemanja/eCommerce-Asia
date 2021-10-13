<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrderDetails extends Model
{
    protected $table = 'bdtdc_order_details';
    protected $fillable = ['order_id','product_name','product_details','product_id','product_image','quantity','unit_id','unit_price'];

    public function productDetails()
    {
        return $this->hasOne('App\Model\BdtdcProduct','id','product_id');
    }
    public function orderProductDetails()
    {
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
    }
    public function orderProductUnit(){
        return $this->hasOne('App\Model\BdtdcProductUnit','id','unit_id');
    }

}