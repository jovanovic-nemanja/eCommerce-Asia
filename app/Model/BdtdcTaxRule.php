<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcTaxRule extends Model
{
    protected $table = 'bdtdc_tax_rule';
	protected $guarded = array('created_at', 'updated_at');


	public function bdtdcTaxRate(){
    	return $this->belongsTo('App\Model\BdtdcTaxRate', 'tax_rate_id');
    }

	public function bdtdcTaxClass(){
    	return $this->belongsTo('App\Model\BdtdcTaxClass', 'tax_class_id');
    }
}
