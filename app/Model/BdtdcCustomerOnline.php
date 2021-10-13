<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomerOnline extends Model
{
     protected $table = 'bdtdc_customer_online';
	protected $guarded = array('created_at', 'updated_at');

  public function bdtdcCustomer()
    {
        return $this->belongsTo('App\Model\BdtdcCustomer', 'customer_id');
    }
}
