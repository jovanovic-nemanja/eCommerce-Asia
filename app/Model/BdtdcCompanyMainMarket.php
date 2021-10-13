<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyMainMarket extends Model
{
    //
    protected $table = 'bdtdc_company_main_markets';
    protected $guarded = array('created_at', 'updated_at');
    protected $fillable = ['company_id','main_market_zone','distribution_value'];
    
    public function company()
    {
    	return $this->belongsTo('App\Model\BdtdcCompany', 'company_id');
    }
    public function main_market()
    {
    	return $this->belongsTo('App\Model\BdtdcCountry', 'id','main_market_zone');
    }
    public function company_main_market()
    {
        return $this->hasOne('App\Model\BdtdcCountry', 'id','main_market_zone');
    }
    public function form_value()
    {
        return $this->belongsTo('App\BdtdcFormValue', 'main_market_zone', 'id');
    }
    
}
