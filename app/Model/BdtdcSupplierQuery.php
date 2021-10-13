<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplierQuery extends Model
{
    protected $table="bdtdc_supllier_inqueries";
    protected $fillable  = ['product_id','product_owner_id','unit_id','quantity','total_price','message','sender','status','is_join_quotation'];

    /*
    Status list
    ------------
        0 = Pending
        1 = Approved
        2 = Rejected
        3 = Completed
        4 = Closed
    */
    
    public function BdtdcSupplierQueryProduct(){
    	return $this->hasOne('App\Model\BdtdcProduct','id','product_id');
    }
    public function productname(){
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
    }
    public function BdtdcInqueryMessage(){
        return $this->hasMany('App\Model\BdtdcInqueryMessage','inquery_id','id');
    }
    public function queryproduct()
    {
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
    }
    public function BdtdcSupplierQueryProductImage(){
    	return $this->hasOne('App\Model\BdtdcProductImage','product_id','product_id');
    }
    public function BdtdcSupplierQueryProductImages(){
        return $this->hasOne('App\Model\BdtdcProductImageNew','product_id','product_id');
    }
    public function BdtdcSupplierQueryProductDocs(){
        return $this->hasOne('App\Model\bdtdcInqueryDocs','inquery_id','id');
    }
    public function bdtdcProductToCategory(){
        return $this->hasOne('App\Model\BdtdcProductToCategory', 'product_id','product_id');
    }
    public function BdtdcSupplierQueryProductUnit(){
    	return $this->hasOne('App\Model\BdtdcProductUnit','id','unit_id');
    }
    public function product_owner_supplier()
    {
        return $this->hasOne('App\Model\User','id','product_owner_id');
    }
    public function sender_name()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','sender');
    }
}
