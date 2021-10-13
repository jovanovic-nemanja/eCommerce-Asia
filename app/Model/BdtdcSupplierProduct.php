<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplierProduct extends Model
{
    protected $table = 'bdtdc_supplier_products';
	protected $guarded = array('created_at', 'updated_at');


    public function suppliers(){
    	return $this->belongsTo('App\Model\BdtdcSupplier', 'supplier_id','user_id');
    }
    public function supplier_membership(){
        return $this->hasOne('App\Model\BdtdcSupplierInfo','id', 'supplier_id');
    }
    public function sup_companies(){
        return $this->hasOne('App\Model\BdtdcCompany','user_id','supplier_id');
    }

    public function products()
    {
    	return $this->belongsTo('App\Model\BdtdcProduct', 'product_id');
    }
    public  function users(){
        
     return $this->hasOne('App\Model\User', 'id','supplier_id');
    }
    public function sup_main_products(){
        return $this->hasOne('App\Model\BdtdcSupplierMainProduct','supplier_id','supplier_id');
    }
     
}
