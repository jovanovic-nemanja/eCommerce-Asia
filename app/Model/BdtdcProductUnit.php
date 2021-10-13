<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductUnit extends Model
{
    protected $table = 'bdtdc_product_unit';
    protected $guarded = array('created_at', 'updated_at');

    public function product()
    {
        return $this->hasOne('App\Model\BdtdcProduct','unit_type_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\BdtdcCategory', 'category_id');
    }

    public function sample_request_unit()
    {
        return $this->belongsTo('App\Model\BdtdcSampleProducts','unit_id');
    }
}
