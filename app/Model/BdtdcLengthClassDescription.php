<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcLengthClassDescription extends Model
{
    protected $table = 'bdtdc_length_class_description';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcLengthClass(){
		return $this->belongsTo('App\Model\BdtdcLengthClass', 'length_class_id');

	}
	public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}

}
