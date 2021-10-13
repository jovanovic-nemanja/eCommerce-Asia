<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSetting extends Model
{
    protected $table = 'bdtdc_setting';
	protected $guarded = array('created_at', 'updated_at');
	public function bdtdcStore(){
    	return $this->belongsTo('App\Model\BdtdcStore', 'store_id');
    }


    
}
