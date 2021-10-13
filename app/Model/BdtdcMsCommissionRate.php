<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMsCommissionRate extends Model
{
   protected $table = 'bdtdc_ms_commission_rate';
protected $guarded = array('created_at', 'updated_at');

   
public function bdtdcCommission(){
    	return $this->belongsTo('App\Model\BdtdcCommission', 'commission_id');
    }
}
