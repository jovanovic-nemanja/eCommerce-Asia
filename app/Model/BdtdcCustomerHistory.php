<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomerHistory extends Model
{
     protected $table = 'bdtdc_customer_history';
	protected $guarded = array('created_at', 'updated_at');

  public function bdtdcCustomer()
    {
        return $this->belongsTo('App\Model\BdtdcCustomer', 'customer_id');
    }
}
