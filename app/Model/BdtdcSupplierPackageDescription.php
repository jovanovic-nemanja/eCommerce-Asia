<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplierPackageDescription extends Model
{
     protected $table = 'bdtdc_supplier_package_descriptions';
	protected $guarded = array('created_at', 'updated_at');




    public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
	public function packages()
	{
		return $this->belongsTo('App\Model\BdtdcSupplierPackage','supplier_package_id');
	}

}
