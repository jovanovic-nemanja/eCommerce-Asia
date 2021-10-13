<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplierMainProduct extends Model
{
    //

    protected $table 	= 'bdtdc_supplier_main_products';
	protected $guarded 	= array('created_at', 'updated_at');
	protected $fillable = ['supplier_id','product_name_1','product_name_2','product_name_3'];
	

	public function suppliers()
	{
		return $this->belongsTo('App\Model\BdtdcSupplier','supplier_id','id');
	}

	public function suppliers_products()
	{
		return $this->belongsTo('App\Model\BdtdcSupplierProduct','supplier_id','supplier_id');
	}

	public function business_port()
    {
        return $this->belongsTo('App\Model\BdtdcLogisticInfo','product_id','product_id');
    }
    public function payment_method()
    {
        return $this->belongsTo('App\Model\BdtdcProduct','product_id','id');
    }



}
