<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplierInquery extends Model
{
    protected $table = "bdtdc_supllier_inqueries";
    protected $fillable = ['id','product_id','messages','quantity','unit_price','sender','product_owner_id','status','total','unit_id','active'];

    public function bdtdc_product()
    {
    	return $this->belongsTo('App\Model\BdtdcProduct','product_id','id');
    }

    public function inq_products_description()
    {
    	return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
    }

    public function inq_message()
    {
        return $this->hasMany('App\Model\BdtdcInqueryMessage','inquery_id','id');
    }

    public function inq_products_image()
    {
    	return $this->hasOne('App\Model\BdtdcProductImage','product_id','product_id');
    }

    public function inq_products_image_all()
    {
        return $this->hasMany('App\Model\BdtdcProductImage','product_id','product_id');
    }

    public function p_price()
    {
        return $this->hasOne('App\Model\BdtdcProductPrice','product_id','product_id');
    }

    public function inq_products_images()
    {
        return $this->hasOne('App\Model\BdtdcProductImageNew','product_id','product_id');
    }

    public function inq_products_images_all()
    {
        return $this->hasMany('App\Model\BdtdcProductImageNew','product_id','product_id');
    }

    public function inq_unit_id()
    {
    	return $this->belongsTo('App\Model\BdtdcProductUnit','unit_id','id');
    }

    public function bdtdc_product_attribute()
    {
        return $this->hasMany('App\Model\BdtdcProductAttribute','product_id','product_id');
    }
    public function inq_products_category()
    {
    	return $this->hasOne('App\Model\BdtdcProductToCategory','product_id','product_id');
    }
    public function sender_company()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','sender');
    }
    public function sender_customers_info(){
        return $this->hasOne('App\Model\BdtdcCustomer','user_id','sender');
    }
    public function product_owner_company()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','product_owner_id');
    }
    public function product_owner_supplier()
    {
        return $this->hasOne('App\Model\BdtdcSupplier','user_id','product_owner_id');
    }
    public function product_owner_customers_info(){
        return $this->hasOne('App\Model\BdtdcCustomer','user_id','product_owner_id');
    }
    public function product_owner_user()
    {
        return $this->hasOne('App\Model\User','id','product_owner_id');
    }
    public function inq_sender_user()
    {
        return $this->hasOne('App\Model\User','id','sender');
    }
    public function inq_docs()
    {
        return $this->hasMany('App\Model\bdtdcInqueryDocs','inquery_id','id');
    }
    public function inq_docs_one()
    {
        return $this->hasOne('App\Model\bdtdcInqueryDocs','inquery_id','id');
    }
    public function productname(){
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
    }
    public function BdtdcSupplierQueryProductUnit(){
        return $this->hasOne('App\Model\BdtdcProductUnit','id','unit_id');
    }
    public function product_supplier()
    {
        return $this->hasOne('App\Model\User','id','product_owner_id');
    }
    public function sender_name()
    {
        return $this->hasOne('App\Model\BdtdcSupplier','user_id','sender');
    }
    public function home_inquiry()
    {
        return $this->hasOne('App\Model\BdtdcHomeInquires','inquiry_id','id');
    }
}
