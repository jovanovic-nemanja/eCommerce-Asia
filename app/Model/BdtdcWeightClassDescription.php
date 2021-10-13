<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcWeightClassDescription extends Model
{
    protected $table = 'bdtdc_weight_class_description';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcWeightClass(){

	return $this->belongsTo('App\Model\BdtdcWeightClass','weight_class_id');
}
public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
}
