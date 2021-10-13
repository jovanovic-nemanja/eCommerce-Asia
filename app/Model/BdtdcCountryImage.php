<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCountryImage extends Model
{
    protected $table = 'bdtdc_country_images';
    protected $guarded = array('created_at', 'updated_at');

    public function country_category()
    {
        return $this->belongsTo('App\Model\BdtdcProductToCategory', 'country_id');
    }
    public function country_country(){
    	return $this->belongsTo('App\Model\BdtdcCountry', 'country_id');
    }
    
}
