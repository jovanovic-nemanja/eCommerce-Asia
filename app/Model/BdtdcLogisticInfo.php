<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcLogisticInfo extends Model
{
    protected $table = 'bdtdc_logistic_infos';
    protected $guarded = array('created_at', 'updated_at');

    public function product_logi_info()
    {
    	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
    }
}
