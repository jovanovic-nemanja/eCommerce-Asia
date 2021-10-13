<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrder extends Model
{
    protected $table = 'bdtdc_order';
	// protected $guarded = array('created_at', 'updated_at');
    protected $fillable = ['inquery_id','quote_id','messages','quantity','shipping_method','payment_terms','sender','product_owner_id','initial_payment','status','coverage_type','is_msg','is_view','waiting_status','process_status','shipping_fee','insurance_charge','shipment_date','shipment_date_type','shipment_days_after','shipping_address_id'];

    public function bdtdcOrderDetails()
    {
        return $this->hasMany('App\Model\BdtdcOrderDetails','order_id','id');
    }
    public function inq_sender_user()
    {
        return $this->hasOne('App\Model\User','id','sender');
    }
    public function product_owner_user()
    {
        return $this->hasOne('App\Model\User','id','product_owner_id');
    }
    public function sender_company()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','sender');
    }
    public function product_owner_company()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','product_owner_id');
    }
    public function bdtdcInqueryMessageSender()
    {
        return $this->hasOne('App\Model\User','id','sender');
    }
    public function orderInquiry()
    {
        return $this->hasOne('App\Model\BdtdcSupplierInquery','id','inquery_id');
    }
    public function paymentHistory(){
        return $this->hasOne('App\Model\OrderPaymentHistory','order_id','id');
    }
    
}
