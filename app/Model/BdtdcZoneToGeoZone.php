<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcZoneToGeoZone extends Model
{
   protected $table = 'bdtdc_zone_to_geo_zone';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcCountry(){
    	return $this->belongsTo('App\Model\BdtdcCountry', 'country_id');
    }
 public function bdtdcZone(){
    	return $this->belongsTo('App\Model\BdtdcZone', 'zone_id');
    }

     public function bdtdcGeoZone(){
    	return $this->belongsTo('App\Model\BdtdcGeoZone', 'geo_zone_id');
    }


}
