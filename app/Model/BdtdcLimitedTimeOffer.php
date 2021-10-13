<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcLimitedTimeOffer extends Model
{
    //
    protected $table = 'bdtdc_limited_lime_offers';
    protected $guarded = array('created_at', 'updated_at');
    
    public function bdtdcProduct()
    {
        return $this->belongsTo('App\Model\BdtdcProduct','product_id');
    }
    public function product_name(){
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
    }
    public function bdtdcproductimage()
    {
        return $this->hasOne('App\Model\BdtdcProductImage','product_id','product_id');
    }
    public function bdtdcproductimages()
    {
        return $this->hasOne('App\Model\BdtdcProductImageNew','product_id','product_id');
    }
    public function wholesale_product_category()
    {
        return $this->belongsTo('App\Model\WholesaleProductCategoryModel','product_id','product_id');
    }
    public function bdtdcCategory(){
        return $this->hasOne('App\Model\BdtdcCategory', 'id','sub_category');
    }
    public function bdtdc_parent_Category(){
        return $this->hasOne('App\Model\BdtdcCategory', 'id','parent_category');
    }
    public function pro_parent_cat()
    {
        return $this->hasMany('App\Model\BdtdcCategory', 'parent_id','parent_category');
    }
    public function pro_cat_pro(){
        return $this->hasMany('App\Model\BdtdcLimitedTimeOffer','sub_category','sub_category');
    }
    public function pro_sub_cat(){
        return $this->hasMany('App\Model\BdtdcLimitedTimeOffer','parent_category','parent_category');
    }

   
}
