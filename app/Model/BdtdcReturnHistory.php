<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcReturnHistory extends Model
{
     protected $table = 'bdtdc_history';
	protected $guarded = array('created_at', 'updated_at');
	public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
	public function bdtdcReturnStatus(){
	return $this->belongsTo('App\Model\BdtdcReturnStatus','return_status_id')
}

public function bdtdcReturn(){
	return $this->belongsTo('App\Model\BdtdcReturn','return_id')
}


}
