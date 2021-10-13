<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompany extends Model
{
    protected $table = 'bdtdc_companies';
    protected $guarded = array('created_at', 'updated_at');
    protected $fillable = ['user_id','location_of_reg','year_of_reg','city','region','zip_code','postal_code','total_employe','company_website','office_suite'];

    public function factory_info()
    {
        return $this->hasOne('App\Model\BdtdcFactoryInfo','company_id','id');
    }

    public function bdtdc_company_exhibit()
    {
        return $this->hasMany('App\Model\BdtdcCompanyExibit','company_id','id');
    }

    public function bdtdc_agent_service()
    {
        return $this->hasMany('App\Model\BdtdcCompanyService','company_id','id');
    }
   
    public function bdtdc_agent()
    {
        return $this->hasOne('App\Model\BdtdcAgent','company_id','id');
    }
    public function customers()
    {
    	return $this->belongsTo('App\Model\BdtdcCustomer', 'user_id','user_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function Role_user()
    {
        return $this->hasOne('App\Model\Role_user', 'user_id', 'user_id');
    }

    public function name_string()
    {
		return $this->hasOne('App\Model\BdtdcCompanyDescription', 'company_id','id');

	}

    public function location_of_reg_string()
    {
        return $this->belongsTo('App\Model\BdtdcCountry','location_of_reg','id');
    }
    public function country_by_city()
    {
        return $this->belongsTo('App\Model\BdtdcCountry','city','id');
    }
    public function company_description()
    {
        return $this->hasOne('App\Model\BdtdcCompanyDescription','company_id','id');
    }

    public function country()
    {
        return $this->belongsTo('App\Model\BdtdcCountry','location_of_reg','id');
    }
    public function company_image()
    {
        return $this->hasOne('App\Model\BdtdcCompanyImage','company_id','id');
    }
    public function tradeinfo()
    {
         return $this->hasOne('App\Model\BdtdcTradeInfo','company_id');
    }
    public function tradejoininfo()
    {
        return $this->hasOne('App\Model\BdtdcTradeJoinInfo','company_id');
    }
    public function companymainmarket()
    {
        return $this->hasOne('App\Model\BdtdcCompanyMainMarket','company_id');
    }
    public function bdtdc_main_market()
    {
        return $this->hasMany('App\Model\BdtdcCompanyMainMarket','company_id','id');
    }
    public function supplier_info()
    {
        return $this->hasOne('App\Model\BdtdcSupplierInfo','company_id','id');
    
    }

    public function supplier()
    {
        return $this->hasOne('App\Model\BdtdcSupplier','company_id','id');
    }

    public function main_products()
    {
        return $this->hasOne('App\Model\BdtdcSupplierMainProduct','supplier_id','user_id');
    }
    public function supplierInfo()
    {
        return $this->belongsTo('App\Model\BdtdcSupplierInfo','company_id');
    }
    public function company_product_to_category()
    {
        return $this->hasMany('App\Model\BdtdcProductToCategory','company_id','id');
    }

    
}
