<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplierInvoice extends Model
{
    protected $table = 'bdtdc_supplier_invoice';
    protected $guarded = array('created_at', 'updated_at');
    protected $fillable = ['company_id','invoice_number'];

    public function membership(){
    	return $this->belongsTo('App\Model\BdtdcSupplierInfo', 'membership_id','id');
    }
    public function order_invoice(){
    	return $this->hasOne('App\Model\OrderPaymentHistory', 'order_id','order_id');
    }
}
