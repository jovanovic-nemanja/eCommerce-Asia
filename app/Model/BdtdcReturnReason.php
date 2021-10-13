<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcReturnReason extends Model
{
    protected $table = 'bdtdc_reason';
	protected $guarded = array('created_at', 'updated_at');
	public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
}
