<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMsSellerGroupCriteria extends Model
{
     protected $table = 'bdtdc_ms_seller_group_criteria';
	protected $guarded = array('created_at', 'updated_at');



 public function bdtdcMsCriteria(){
    	return $this->belongsTo('App\Model\BdtdcMsCriteria', 'criteria_id');
    }
    public function bdtdcMsCommission(){
    	return $this->belongsTo('App\Model\BdtdcMsCommission', 'commission_id');
    }
}
