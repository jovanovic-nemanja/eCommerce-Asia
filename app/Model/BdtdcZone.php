<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcZone extends Model
{
    protected $table = 'bdtdc_zone';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcCountry(){
    	return $this->belongsTo('App\Model\BdtdcCountry', 'country_id');
    }


    
}
