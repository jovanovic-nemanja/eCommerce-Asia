<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyDescription extends Model
{
     protected $table = 'bdtdc_company_descriptions';
    protected $guarded = array('created_at', 'updated_at');

   
   
    public function bdtdcCategory()
     {
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id');
    }
    public function bdtdcLanguage()
    {
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	} 
	public function bdtdcCompany()
	{
		return $this->belongsTo('App\Model\BdtdcCompany', 'company_id');

	}
    public function company_product()
    {
        return $this->hasMany('App\Model\BdtdcProductToCategory', 'company_id','company_id');
    }
    
    public function customer_activity()
    {
        return $this->hasMany('App\Model\BdtdcCustomerActivity', 'data','company_id');
    }
    
}
