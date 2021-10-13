<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrderTotal extends Model
{
    protected $table = 'bdtdc_order_total';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcOrder(){
		return $this->belongsTo('App\Model\BdtdcOrder', 'order_id');
	}




}
