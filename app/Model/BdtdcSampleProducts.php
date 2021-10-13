<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSampleProducts extends Model
{

    protected $table = 'bdtdc_sample_products';
    protected $fillable = ['id','request_id','product_name','product_details','product_image','quantity','unit_id'];

    public function unit()
    {
    	return $this->belongsTo('App\Model\BdtdcProductUnit','unit_id');
    }


}