<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSampleRequests extends Model
{

    protected $table = 'bdtdc_sample_requests';
    protected $fillable = ['id','product_owner_id','message','sender','delivery_address','Expected_date_of_Arriva'];


    public function request_product()
    {
        return $this->hasOne('App\Model\BdtdcSampleProducts','request_id');
    }

    public function buyer_company()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','sender');
    }

    public function supplier_company()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','product_owner_id');
    }
}