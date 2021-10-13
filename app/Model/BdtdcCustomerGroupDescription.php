<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomerGroupDescription extends Model
{
     protected $table = 'bdtdc_customer_group_description';
	protected $guarded = array('created_at', 'updated_at');

public function bdtdcCustomerGroup(){
    	return $this->belongsTo('App\Model\BdtdcCustomerGroup', 'customer_group_id');
    }
  public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
}
