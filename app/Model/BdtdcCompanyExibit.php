<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyExibit extends Model
{
    protected $table = 'bdtdc_company_exibit';
    protected $guarded = array('created_at', 'updated_at');
    protected $fillable = ['company_id','tradeshow_id'];

    public function tradeshow()
    {
    	return $this->hasOne('App\Model\BdtdcTradeshow','id','tradeshow_id');
    }

   
}
