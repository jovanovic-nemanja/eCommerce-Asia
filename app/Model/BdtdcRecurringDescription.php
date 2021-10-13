<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcRecurringDescription extends Model
{
     protected $table = 'bdtdc_recurring_description';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}

 public function bdtdcRecurring(){
	return $this->belongsTo('App\Model\BdtdcRecurring','recurring_id');
}



}
