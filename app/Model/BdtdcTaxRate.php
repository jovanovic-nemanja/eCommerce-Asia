<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcTaxRate extends Model
{
     protected $table = 'bdtdc_tax_rate';
	protected $guarded = array('created_at', 'updated_at');
	public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}

	 public function bdtdcGeoZone(){
    	return $this->belongsTo('App\Model\BdtdcGeoZone', 'geo_zone_id');
    }
}
