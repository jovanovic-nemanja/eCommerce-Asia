<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcJoinQuotation extends Model
{
    protected $table = "bdtdc_join_quotation";
    protected $fillable = ['product_id','product_owner_id','sender','message','is_join_quotation'];

    public function product_owner_user()
    {
        return $this->hasOne('App\Model\User','id','product_owner_id');
    }
    public function product_owner_company()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','product_owner_id');
    }
    public function inq_sender_user()
    {
        return $this->hasOne('App\Model\User','id','sender');
    }
    public function sender_company()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','sender');
    }
    public function inq_message()
    {
        return $this->hasMany('App\Model\BdtdcInqueryMessage','inquery_id','id');
    }

}
