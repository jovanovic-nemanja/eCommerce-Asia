<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrderStatus extends Model
{
    protected $table = 'bdtdc_order_status';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}

}
