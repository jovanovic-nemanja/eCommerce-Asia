<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplierPackage extends Model
{
    protected $table = 'bdtdc_supplier_packages';
	protected $guarded = array('created_at', 'updated_at');


    public function bdtdcMsCommission(){
    	return $this->belongsTo('App\Model\BdtdcMsCommission', 'commission_id');
    }
    public function descriptions()
    {
    	return $this->hasOne('App\Model\BdtdcSupplierPackageDescription','supplier_package_id');
    }
    
}
