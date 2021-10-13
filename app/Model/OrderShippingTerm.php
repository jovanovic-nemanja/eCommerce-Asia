<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderShippingTerm extends Model
{
    protected $fillable=['user_id'];

    public function country_info()
    {
      return $this->belongsTo('App\Model\BdtdcCountry', 'country','id');
    }
}
