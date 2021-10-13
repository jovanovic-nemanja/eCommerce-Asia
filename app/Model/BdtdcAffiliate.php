<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcAffiliate extends Model
{
     protected $table = 'bdtdc_affiliate';
    protected $guarded = array('created_at', 'updated_at');

   
     public function bdtdcCountry(){
    	return $this->belongsTo('App\Model\BdtdcCountry', 'country_id');
    }
    public function bdtdcZone(){
    	return $this->belongsTo('App\Model\BdtdcZone', 'zone_id');
    }
}
