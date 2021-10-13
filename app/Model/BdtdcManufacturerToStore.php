<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcManufacturerToStore extends Model
{
     protected $table = 'bdtdc_manufacturer_to_store';
	protected $guarded = array('created_at', 'updated_at');


public function bdtdcManufacturer(){
    	return $this->belongsTo('App\Model\BdtdcManufacturer', 'manufacturer_id');
    }
	public function bdtdcStore(){
    	return $this->belongsTo('App\Model\BdtdcStore', 'store_id');
    }

}
