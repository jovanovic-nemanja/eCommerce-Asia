<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProduct extends Model
{
   protected $table = 'bdtdc_product';
	protected $guarded = array('created_at', 'updated_at');

    public  function scopeLike($query, $field, $key)
    {
        return $query->where($field, 'LIKE', "%$key%");
    }
    
    public function bdtdclimitedtimeoffer()
    {
        return $this->hasOne('App\Model\BdtdcLimitedTimeOffer','product_id');
    }
    public function bdtdcManufacturer()
    {
        return $this->belongsTo('App\Model\BdtdcManufacturer', 'manufacturer_id');
    }
	public function supplier_product_groups()
	{
    	return $this->belongsTo('App\Model\BdtdcSupplierProductGroups', 'product_groups', 'id');
    }
    public function product_name()
    {
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id');
    }

    public function BdtdcSupplierInquery()
    {
        return $this->hasMany('App\Model\BdtdcSupplierInquery','id','product_id');
    }

    public function logistic_info()
    {
        return $this->hasOne('App\Model\BdtdcLogisticInfo','product_id');
    }

    public function bdtdcStockStatus()
    {
    	return $this->belongsTo('App\Model\BdtdcStockStatus', 'stock_status_id');
    }

    public function bdtdcTaxClass(){
    	return $this->belongsTo('App\Model\BdtdcTaxClass', 'tax_class_id');
    }

    public function bdtdcWeightClass(){
        	return $this->belongsTo('App\Model\BdtdcWeightClass', 'weight_class_id');
        }

    public function bdtdcLengthClass(){
        	return $this->belongsTo('App\Model\BdtdcLengthClass', 'length_class_id');
        }

    public function supplier_product()
    {
        return $this->hasOne('App\Model\BdtdcSupplierProduct','product_id');
    }

    public function ProductUnit()
    {
        return $this->belongsTo('App\Model\BdtdcProductUnit', 'unit_type_id');
    }

    public function product_unit()
    {
        return $this->hasOne('App\Model\BdtdcProductUnit', 'id','unit_type_id');
    }

    public function product_prices()
    {
        return $this->hasOne('App\Model\BdtdcProductPrice', 'product_id','id');
    }
    public function bdtdcProductToCategory(){
        return $this->hasOne('App\Model\BdtdcProductToCategory', 'product_id','id');
    }
     public function bdtdcCategory()
    {
        return $this->belongsTo('App\Model\BdtdcCategory','category_id');
    }
     
    public function category()
    {
        return $this->hasOne('App\Model\BdtdcProductToCategory', 'product_id');
    }
    public function product_image()
    {
        return $this->hasOne('App\Model\BdtdcProductImage', 'product_id','id');
    }
    
    public function proimages()
    {
        return $this->hasMany('App\Model\BdtdcProductImage', 'product_id','id');
    }
    public function product_country()
    {
        return $this->hasOne('App\Model\BdtdcCountry', 'id','location');
    }

    public function product_image_new()
    {
        return $this->hasOne('App\Model\BdtdcProductImageNew', 'product_id','id');
    }
    
    public function proimages_new()
    {
        return $this->hasMany('App\Model\BdtdcProductImageNew', 'product_id','id');
    }

    public function product_attribute()
    {
        return $this->hasMany('App\Model\BdtdcProductAttribute', 'product_id','id');
    }
    public function customer_activity()
    {
        return $this->hasMany('App\Model\BdtdcCustomerActivity', 'data','id');
    }

}
