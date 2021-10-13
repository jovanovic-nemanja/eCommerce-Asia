<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomer extends Model
{
    protected $table = 'bdtdc_customer';
	protected $guarded = array('created_at', 'updated_at');

	   
	public function bdtdcCustomerGroup(){
		return $this->belongsTo('App\Model\BdtdcCustomerGroup', 'customer_group_id');
	}
	public function company()
	{
		return $this->hasOne('App\Model\BdtdcCompany','user_id','user_id');
	}

	public function users()
	{
		return $this->belongsTo('App\Model\User','user_id','user_id');
	}

	public function country()
	{
		return $this->belongsTo('App\Model\BdtdcCountry','country_id','country_id');
	}
 	public function suppliers()
    {
    	return $this->belongsTo('App\Model\BdtdcSupplier', 'user_id','user_id');
    }
}
