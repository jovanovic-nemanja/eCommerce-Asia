<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplierProductGroups extends Model
{
    
    protected $table = 'bdtdc_supplier_product_groups';
	protected $guarded = array('created_at', 'updated_at');

	public function BdtdcSupplierProductGroupsProducts()
	{
	   return $this->hasMany('App\Model\BdtdcProduct','product_groups','id');
	}

	public function BdtdcSupplierProductGroups()
	{
	   return $this->hasOne('App\Model\BdtdcProduct','product_groups','id');
	}

	public function company_group()
	{
		return $this->belongsTo('App\Model\BdtdcCompany','company_id');
	}

}