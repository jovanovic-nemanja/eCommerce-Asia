<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrderDetail extends Model
{
    protected $table = 'bdtdc_order_details';
	protected $guarded = array('created_at', 'updated_at');


 
    public function bdtdcorders()
    {
        return $this->hasOne('App\Model\BdtdcOrder','id','order_detais_id');
    }

 }