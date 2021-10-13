<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcAffiliateActivity extends Model
{
      protected $table = 'bdtdc_affiliate_activity';
    protected $guarded = array('created_at', 'updated_at');

   
    public function bdtdcAffiliate(){
    	return $this->belongsTo('App\Model\BdtdcAffiliate', 'affiliate_id');
    }
    
}
