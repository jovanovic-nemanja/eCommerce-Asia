<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCountry extends Model
{
    protected $table = 'bdtdc_country';

    public function Product()
    {
      return $this->belongsTo('App\Model\BdtdcProduct', 'product_id');
    }
    public function country_for_image()
    {
    	return $this->hasMany('App\Model\BdtdcCountryImage', 'country_id','id');
    }
    public function country_image_one()
    {
    	return $this->hasOne('App\Model\BdtdcCountryImage', 'country_id','id');
    }
    public function contry_products()
    {
     	return $this->hasMany('App\Model\BdtdcProductToCategory', 'country_id','id');
    }
    public function country_region()
    {
     	return $this->hasMany('App\Model\BdtdcCountry', 'region_id','id');
    }
}
