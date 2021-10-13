<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcInqueryMessage extends Model
{
    protected $table = "bdtdc_inquery_messages";
    protected $fillable = ['inquery_id','product_id','messages','quantity','unit_price','sender','product_owner_id','status','total'];

    /*
    Status list
    ------------
        1 = Approved
        2 = Pending
        3 = Rejected
        4 = Completed
        5 = Closed
    */
    
    public function bdtdcInqueryMessageProduct()
    {
    	return $this->hasOne('App\Model\BdtdcProduct','id','product_id');
    }
    public function bdtdcInquery()
    {
        return $this->hasOne('App\Model\BdtdcSupplierInquery','id','inquery_id');
    }
    public function bdtdcInqueryMessageProductDescription()
    {
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
    }
    public function bdtdcInqueryMessageDocs()
    {
        return $this->hasMany('App\Model\BdtdcQuoteDocs','message_id','id');
    }
    public function bdtdcInqueryMessageDocsOne()
    {
        return $this->hasOne('App\Model\BdtdcQuoteDocs','message_id','id');
    }
    public function bdtdcInqueryMessageProductImage()
    {
    	return $this->hasOne('App\Model\BdtdcProductImage','product_id','product_id');
    }
    public function bdtdcInqueryMessageProductImageNew()
    {
        return $this->hasOne('App\Model\BdtdcProductImageNew','product_id','product_id');
    }
    public function bdtdcInqueryMessageLogisticInfo()
    {
    	return $this->hasOne('App\Model\BdtdcLogisticInfo','product_id','product_id');
    }
    public function bdtdcInqueryMessageProductCategory()
    {
        return $this->hasOne('App\Model\BdtdcProductToCategory','product_id','product_id');
    }
    public function bdtdcInqueryMessageUser()
    {
        return $this->hasOne('App\Model\User','id','product_owner_id');
    }
    public function bdtdcInqueryMessageSender()
    {
        return $this->hasOne('App\Model\User','id','sender');
    }
    public function bdtdcInqueryMessageProductCompany()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','product_owner_id');
    }
    public function bdtdcInqueryMessageProductCompanySender()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','sender');
    }
    public function bdtdcInqueryMessageProductprice()
    {
    	return $this->hasOne('App\Model\BdtdcProductPrice','product_id','product_id');
    }
    public function bdtdcInqueryMessageSupplier()
    {
        return $this->hasOne('App\Model\BdtdcSupplier','user_id','product_owner_id');
    }
    public function bdtdcInqueryMessageSupplierSender()
    {
        return $this->hasOne('App\Model\BdtdcSupplier','user_id','sender');
    }
    public function messagePerProductOwner(){
        return $this->hasMany('App\Model\BdtdcInqueryMessage','product_owner_id','product_owner_id');
    }
    public function all_quote_messages()
    {
        return $this->hasMany('App\Model\BdtdcInqueryMessage','quote_id','id');
    }
}
