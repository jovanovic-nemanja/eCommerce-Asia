<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplier extends Model
{
    protected $table = 'bdtdc_suppliers';
	protected $guarded = array('created_at', 'updated_at');



    public function supplier_package()
    {
    	return $this->belongsTo('App\Model\BdtdcSupplierPackage', 'supplier_package_id');
    }
    public function package_name()
    {
         return $this->hasOne('App\Model\BdtdcSupplierPackageDescription','supplier_package_id');
   
    }
    public function business_types()
    {
        return $this->belongsTo('App\Model\BdtdcBusinesType','busines_type_id','id');
    }
    public function main_products()
    {
        return $this->hasOne('App\Model\BdtdcSupplierMainProduct','supplier_id','id');
    }
    public function bdtdcMsCommission()
    {
    	return $this->belongsTo('App\Model\BdtdcMsCommission', 'commission_id');
    }
    public function supplier_products()
    {
        return $this->hasMany('App\Model\BdtdcSupplierProduct','supplier_id');
    }

    public function bdtdcCountry()
    {
    	return $this->hasOne('App\Model\BdtdcCountry','id', 'country_id');
    }
    public function bdtdcZone()
    {
    	return $this->belongsTo('App\Model\BdtdcZone', 'zone_id');
    }
    public function customers()
    {
        return $this->hasOne('App\Model\BdtdcCustomer','user_id','user_id');
    }

    public function company_name()
    {
        return $this->hasOne('App\Model\BdtdcCompany','user_id','user_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }




}
