<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSupplierInfo extends Model
{
    protected $table = 'bdtdc_suppliers_info';
    protected $guarded = array('created_at', 'updated_at');
    
    public function name_string(){
		return $this->hasOne('App\Model\BdtdcCompanyDescription', 'company_id','company_id');

	}

	public function name_string_company(){
		return $this->belongsTo('App\Model\BdtdcCompanyDescription', 'company_id','company_id');

	}

	public function company()
	{
		return $this->hasOne('App\Model\BdtdcCompany', 'id','company_id');
	}
	public function customer()
	{
		return $this->hasOne('App\Model\BdtdcCustomer', 'company_id','company_id');
	}

	public function product_to_category()
	{
		return $this->hasOne('App\Model\BdtdcProductToCategory', 'company_id','company_id');
	}
	public function product_category()
	{
		return $this->hasMany('App\Model\BdtdcProductToCategory', 'company_id','company_id');
	}
	public function invoice()
    {
	   	return $this->hasOne('App\Model\BdtdcSupplierInvoice','membership_id', 'id');
    }
   
    public function business_supplier()
    {
	   	return $this->belongsTo('App\Model\BdtdcSupplier', 'company_id','company_id');
    }
    public function supp_pro_company()
    {
        return $this->belongsTo('App\Model\BdtdcCompany','company_id','company_id');
    }
    public function supp_pro_pack()
    {
        return $this->hasOne('App\Model\BdtdcSupplierPackage','id','membership_pakacge_id');
    }
    public function supp_pro_packname()
    {
        return $this->hasOne('App\Model\BdtdcSupplierPackageDescription','supplier_package_id','membership_pakacge_id');
    }

    
}
