<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcAddress extends Model
{
    protected $table = 'bdtdc_address';
    protected $guarded = array('created_at', 'updated_at');

    public function bdtdcCustomer()
    {
        return $this->belongsTo('App\Model\BdtdcCustomer', 'customer_id');
    }
    public function bdtdcCountry(){
    	return $this->belongsTo('App\Model\BdtdcCountry', 'country_id');
    }
    public function bdtdcZone(){
    	return $this->belongsTo('App\Model\BdtdcZone', 'zone_id');
    }
}
