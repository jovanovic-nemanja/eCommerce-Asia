<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomerIp extends Model
{
     protected $table = 'bdtdc_customer_ip';
	protected $guarded = array('created_at', 'updated_at');

  public function bdtdcCustomer()
    {
        return $this->belongsTo('App\Model\BdtdcCustomer', 'customer_id');
    }
}
